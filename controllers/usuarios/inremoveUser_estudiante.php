<?php 	

require('../../conexionbd/session.php');


$valid['success'] = array('success' => false, 'messages' => array());

$userId = $_POST['userId'];
$dni = $_POST['dni'];
if($userId) { 

 
 $sql = "UPDATE login SET Situacion = 1 WHERE id='$userId'";

$sql2="UPDATE estudiantes set estado = 1 where dni ='$dni'";
        
mysqli_query($connect,$sql2);
        
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