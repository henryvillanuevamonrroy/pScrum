
<?php 
	require_once "../../../conexionbd/connectDB.php";
	
	$id=$_POST['id'];

	$sql="DELETE from hora_horario where indice='$id'";
	echo $result=mysqli_query($connect,$sql);
 ?>