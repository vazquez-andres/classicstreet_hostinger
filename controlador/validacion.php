<?php
include 'conexion_bd.php';
$usuario=$_POST['nombre'];
$encriptado = hash("sha256",$_POST['password']);
session_start();
$_SESSION['nombre']=$usuario;



$consulta="SELECT * FROM usuarios where usuario='$usuario' and password='$encriptado'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']=='1'){ //administrador
	header("location:../index_admin.php");

}else
if($filas['id_cargo']==2){ //cliente
	header("location:../index_ventas.php");
}
else{
	?>
	<?php
	header("location:../index.php");
	?>
	
	<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);