
<?php 
	require_once "../../../conexionbd/connectDB.php";
	
	$id=$_POST['id'];

	$sql="UPDATE tarea set estado=2 where id='$id'";
        
	echo $result=mysqli_query($connect,$sql);
 ?>