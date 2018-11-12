<?php 

	require_once "../../../conexionbd/connectDB.php";
        
	$c=$_POST['epica'];
	$d=$_POST['descripcion'];
        $e=$_POST['id_proyecto'];

	$sql="INSERT into epicas (epica,descripcion,estado,id_proyecto) values ('$c','$d','1','$e')";
	echo $result=mysqli_query($connect,$sql);
       
 ?>