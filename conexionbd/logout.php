<?php 
// remove all session variables
include ('session.php');
session_unset(); 
// destroy the session 
 if(session_destroy()) {session_destroy(); 
 header('location: ../login.php');}
?>