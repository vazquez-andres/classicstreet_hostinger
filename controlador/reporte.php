<?php
require('fpdf184/fpdf.php');

include 'conexion_bd.php';
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('../assets/images/reporte.png',15,8,70);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(121,15,'REPORTE SEMANAL DE VENTAS',0,0,'C');

    // Line break
    $this->Ln(8);
 // Arial bold 15
    $this->SetFont('Arial','B',10);
    $this->Cell(286,12,utf8_decode('Teoloyucan, C. Matamoros, 54770 México, Méx.'),0,0,'C');
    // Line break
    $this->Ln(5);
    $this->Cell(338,10,utf8_decode('Tel. 5550512885'),0,0,'C');
    // Line break
    $this->Ln(20);
    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $dias = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
    $this->Cell(315,-23, $diassemana[date('w')]." ".$dias[date('d')-1]." de ".$meses[date('n')-1]. " del ".date('Y'),0,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    // Title
    $this->Cell(125,15,'',0,0,'C');
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}


$consulta="select producto,precio,nombre_vendedor,fecha from ventas";
$result=mysqli_query($conexion,$consulta);
$number_of_products = mysqli_num_rows($result);

//Initialize the 3 columns and the total
$column_code = "";
$column_name = "";
$column_fecha = "";
$column_price = "";

$total = 0;

//For each row, add the field to the corresponding column
while($row = mysqli_fetch_array($result))
{
    $code = $row["producto"];
    $name = substr($row["nombre_vendedor"],0,20);
    $real_price = $row["precio"];
    $fecha = $row["fecha"];
    $column_code = $column_code.$code."\n";
    $column_name = $column_name.$name."\n";
    $column_fecha = $column_fecha.$fecha."\n";
    $column_price = $column_price.'$ '.$real_price."\n";

    //Sum all the Prices (TOTAL)
    $total = $total+$real_price;
}
mysqli_close($conexion);

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);



//Fields Name position
$Y_Fields_Name_position =50;
//Table position, under Fields Name
$Y_Table_Position = 56;

//First create each Field Name
//Gray color filling each Field Name box
$pdf->SetFillColor(232,232,232);
//Bold Font for Field Name
$pdf->SetFont('Arial','B',12);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(15);
$pdf->Cell(50,6,'PRODUCTO/SERVICIO',1,0,'L',1);
$pdf->SetX(65);
$pdf->Cell(30,6,'BARBERO',1,0,'L',1);
$pdf->SetX(95);
$pdf->Cell(90,6,'FECHA',1,0,'L',1);

$pdf->SetX(155);
$pdf->Cell(38,6,'TOTAL',1,0,'R',1);
$pdf->Ln();

//Now show the 3 columns
$pdf->SetFont('Arial','',12);
$pdf->SetY($Y_Table_Position);
$pdf->SetX(15);
$pdf->MultiCell(50,6,$column_code,1);
$pdf->SetY($Y_Table_Position);

$pdf->SetX(65);
$pdf->MultiCell(30,6,$column_name,1);
$pdf->SetY($Y_Table_Position);

$pdf->SetX(95);
$pdf->MultiCell(60,6,$column_fecha,1);
$pdf->SetY($Y_Table_Position);

$pdf->SetX(155);
$pdf->MultiCell(38,6,$column_price,1,'R');
$pdf->SetX(155);
$pdf->MultiCell(38,6,'$ '.$total,1,'R');

//Create lines (boxes) for each ROW (Product)
//If you don't use the following code, you don't create the lines separating each row
$i = 0;
$pdf->SetY($Y_Table_Position);
while ($i < $number_of_products)
{
    $pdf->SetX(15);
    $pdf->MultiCell(178,6,'',1);
    $i = $i +1;
}

$pdf->Output();
$pdf->Output();
?>