
<?php 
	require_once "../../../conexionbd/connectDB.php";
	
	$id=$_POST['id'];

	$sql="DELETE from historias where id='$id'";
	echo $result=mysqli_query($connect,$sql);
 ?>