<?php 	

require('../../conexionbd/session.php');


$valid['success'] = array('success' => false, 'messages' => array());

$userId = $_POST['userId'];

if($userId) { 

 
 $sql = "UPDATE login SET Situacion = 1 WHERE id='$userId'";


 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Desbloqueado exitosamente";		
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error no se ha podido desbloquear";
 }
 
 $connect->close();

 echo json_encode($valid);
 
} // /if $_POST