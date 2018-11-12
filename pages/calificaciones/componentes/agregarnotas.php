<?php
require_once "../../../conexionbd/connectDB.php";
session_start();
$dni = $_SESSION['dni']; 
$contador = $_POST["contador"] ;
$descripcion_tipo = $_POST["descripcion_tipo"] ;
$tipo = $_POST["tipo"] ;
$curso = $_POST["curso"] ;

$cal_grado = $_SESSION['cal_grado'];
$cal_accion = $_SESSION['cal_accion'];

while ($contador > 0) { 
    $alumno = $_POST["alumno".$contador];
    $nota =  $_POST["numero".$contador];
    $contador =$contador -1;
    $sql="INSERT into calificaciones (alumno,nota,curso,grado,descripcion,tipo, fecha,dni) values ('$alumno','$nota','$curso','$cal_grado','$descripcion_tipo','$tipo',CURDATE(),'$dni')";
    mysqli_query($connect,$sql);
}
$sql2="INSERT into calificaciones_r (curso,grado,tipo, fecha,dni) values ('$curso','$cal_grado','$tipo',CURDATE(),'$dni')";
    mysqli_query($connect,$sql2);
							
	header("Location: ../calificaciones.php");
?>