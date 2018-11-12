<?php 

	require_once "../../../conexionbd/connectDB.php";
        
       
         
	$c=$_POST['usuario'];
	$d=$_POST['necesidad'];
        $e=$_POST['razon'];
        $f=$_POST['id_epicas'];

	$sql="INSERT into historias (rol,funcionalidad,razon,id_epica) values ('$c','$d','$e','$f')";
	echo $result=mysqli_query($connect,$sql);
       
 ?>