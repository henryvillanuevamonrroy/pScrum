<?php 	

require_once '../../conexionbd/session.php';

$userId = $_POST['userId'];

$sql = "select * from login l join estudiantes e on l.dni = e.dni where id= $userId;";

$result = $connect->query($sql);

if($result->num_rows > 0) { 
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);