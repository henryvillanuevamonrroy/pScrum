<?php 
	require_once "../../../conexionbd/connectDB.php";
        
  
	$id=$_POST['idhistoria_edt'];
	$c=$_POST['rolc'];
	$d=$_POST['necesidadc'];
        $e=$_POST['razonc'];
        $f=$_POST['prioridadc'];
        $g=$_POST['puntajec'];

	$sql="UPDATE historias set rol='$c', funcionalidad='$d', razon='$e' ,prioridad='$f',puntaje='$g' where id='$id'";
        
	echo $result=mysqli_query($connect,$sql);

 ?>