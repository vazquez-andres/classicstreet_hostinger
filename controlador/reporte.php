<?php
require('fpdf184/fpdf.php');
class PDF extends FPDF
{
/* Page header */
function Header()
{
    
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
    date_default_timezone_set('America/Mexico_City');
    $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    $dias = array("01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31");
    $this->Cell(315,-23, $diassemana[date('w')]." ".$dias[date('d')-1]." de ".$meses[date('n')-1]. " del ".date('Y'),0,0,'C');
    $this->Ln(20);
    $this->SetFont('Arial','B',15);
    // Title
    $this->Cell(125,15,'',0,0,'C');
    
}
/* Page footer */
function Footer()
{
    /* Position at 1.5 cm from bottom */
    $this->SetY(-15);
    /* Arial italic 8 */
    $this->SetFont('Arial','I',8);
    /* Page number */
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

/* Instanciation of inherited class */
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$pdf->SetY(40);

require "config.php";//connection to database
//SQL to get 10 records
$sql="select * from ventas";
$sql2="SELECT SUM(precio) from ventas";
//SELECT SUM(precio)*0.40 from ventas;
$sql3="SELECT COUNT(id_venta) from ventas";



$width_cell=array(40,40,70,40,95,95,31);
$pdf->SetFont('Arial','B',12);
//Background color of header//
$pdf->SetFillColor(193,229,252);

// Header starts /// 
//First header column //
$pdf->Cell($width_cell[0],10,'PRODUCTO',2,0,'C',true);
//Second header column//
$pdf->Cell($width_cell[1],10,'BARBERO',2,0,'C',true);
//Third header column//
$pdf->Cell($width_cell[2],10,'FECHA',2,0,'C',true); 
//Fourth header column//
$pdf->Cell($width_cell[3],10,'TOTAL',2,1,'C',true);


$pdf->SetFont('Arial','',10);
//Background color of header//
$pdf->SetFillColor(235,236,236); 
//to give alternate background fill color to rows// 
$fill=false;

/// each record is one row  ///
foreach ($dbo->query($sql) as $row) {
$pdf->Cell($width_cell[0],7,$row['producto'],2,0,'C',$fill);
$pdf->Cell($width_cell[1],7,$row['nombre_vendedor'],2,0,'C',$fill);
$pdf->Cell($width_cell[2],7,$row['fecha'],2,0,'C',$fill);
$precio_empleado=$row['precio'];

$pdf->Cell($width_cell[3],7,"$ ".$row['precio'],2,1,'C',$fill);
//to give alternate background fill  color to rows//
$fill = !$fill;

}
foreach ($dbo->query($sql2) as $row) {
    $pdf->SetX(10);
    $resultado=$row['SUM(precio)'];
    $f = new NumberFormatter("es", NumberFormatter::SPELLOUT);
    $pdf->Cell($width_cell[4],7,'TOTAL: ',2,0,'R',true);
    $pdf->Cell($width_cell[5],7,"$ ".$resultado." (".(mb_strtoupper($f->format($resultado)))." PESOS) MXN.",2,0,'L',$fill);
    //to give alternate background fill  color to rows//
    $fill = !$fill; 
    }
foreach ($dbo->query($sql3) as $row) {
    $pdf->Ln();

    $pdf->SetX(10);
    setlocale(LC_MONETARY, 'es_MX');
    $resultado=$row['COUNT(id_venta)'];
    $pdf->Cell($width_cell[5],7,"MOSTRANDO ".$resultado." REGISTROS",2,0,'L',$fill);
    $fill = !$fill; 
    }    
$pdf->Output();
?>
     