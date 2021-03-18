<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION["username"];
   echo $user_check;
   
   $ses_sql = mysqli_query($connection,"SELECT user_name FROM user WHERE user_name = '$user_check'");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_name'];
   
   if(!isset($_SESSION["username"])){
      header("location:login.php");
      die();
   }
?>