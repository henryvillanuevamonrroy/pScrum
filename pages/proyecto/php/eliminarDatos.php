
<?php 
	require_once "../../../conexionbd/connectDB.php";
	
	$id=$_POST['id'];

	$sql="DELETE from proyectos where id='$id'";
	echo $result=mysqli_query($connect,$sql);
 ?>