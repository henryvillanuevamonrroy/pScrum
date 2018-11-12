<?php 
	require_once "../../../conexionbd/connectDB.php";
        
        
          
	$id=$_POST['idcriterio_edt'];
	$c=$_POST['escenarioc'];
	$d=$_POST['desencadenantec'];
        $e=$_POST['resultadoc'];
        $f=$_POST['estadoc'];

	$sql="UPDATE criterios_aceptacion set escenario='$c', desencadenante='$d',resultado='$e',estado='$f' where id='$id'";
        
	echo $result=mysqli_query($connect,$sql);

 ?>