<?php 
	require_once "../../../conexionbd/connectDB.php";
        
	$id=$_POST['idproyecto_edt'];
	$c=$_POST['proyectoc'];
	$d=$_POST['descripcionc'];

	$sql="UPDATE proyectos set proyecto='$c', descripcion='$d' where id='$id'";
        
	echo $result=mysqli_query($connect,$sql);

 ?>