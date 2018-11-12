<?php 
	require_once "../../../conexionbd/connectDB.php";
        
	$id=$_POST['idepica_edt'];
	$c=$_POST['epicac'];
	$d=$_POST['descripcionc'];

	$sql="UPDATE epicas set epica='$c', descripcion='$d' where id='$id'";
        
	echo $result=mysqli_query($connect,$sql);

 ?>