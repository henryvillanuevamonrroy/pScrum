<?php 	

require('../../conexionbd/session.php');


$valid['success'] = array('success' => false, 'messages' => array());

$userId = $_POST['userId'];
$dni = $_POST['dni'];
if($userId) { 

 $sql = "call removerUser('$userId')";
$sql2="UPDATE estudiantes set estado = 0 where dni ='$dni'";
mysqli_query($connect,$sql2);

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Eliminado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido eliminar";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST