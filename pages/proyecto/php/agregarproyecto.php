<?php 

	require_once "../../../conexionbd/connectDB.php";
        
	$c=$_POST['proyecto'];
	$d=$_POST['descripcion'];

	$sql="INSERT into proyectos (proyecto,descripcion) values ('$c','$d')";
	echo $result=mysqli_query($connect,$sql);
       
 ?>