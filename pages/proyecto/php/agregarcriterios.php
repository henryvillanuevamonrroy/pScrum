<?php 

	require_once "../../../conexionbd/connectDB.php";
        
        
         
	$c=$_POST['escenario'];
	$d=$_POST['desencadenante'];
        $e=$_POST['resultado'];
        $f=$_POST['id_historia'];

	$sql="INSERT into criterios_aceptacion (escenario,desencadenante,resultado,id_historia) values ('$c','$d','$e','$f')";
	echo $result=mysqli_query($connect,$sql);
       
 ?>