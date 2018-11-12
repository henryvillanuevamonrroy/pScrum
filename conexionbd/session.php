<?php 
include ('connectDB.php');
   session_start();
   
   $user_check = $_SESSION['id'];
   
   $ses_sql = mysqli_query($connect,"SELECT * FROM login WHERE username = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['username'];
   
   if(!isset($_SESSION['id'])){
      header("location: ../../login.php");
   }
 
?>
