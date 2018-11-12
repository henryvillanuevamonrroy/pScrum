<?php 

	require_once "../../../conexionbd/connectDB.php";
        
  
	$c=$_POST['descripcion_tarea'];
	$d=$_POST['id_historia_tarea'];

	$sql="INSERT into tarea (descripcion,id_historia) values ('$c','$d')";
	echo $result=mysqli_query($connect,$sql);
       
 ?>