<?php 	

$localhost = "localhost";
$username = "root";
$password = "root";
$dbname = "pScrum";

// db connection
$connect = mysqli_connect($localhost, $username, $password, $dbname);

/*
$mysqli = new mysqli("localhost", "root", "root", "syscole");
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";


$mysqli = new mysqli("127.0.0.1", "usuario", "contraseña", "basedatos", 3306);
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

echo $mysqli->host_info . "\n";
*/

?>