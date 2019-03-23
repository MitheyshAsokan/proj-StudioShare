<?php
require'connect.php';
session_start();
//saves the session of the current logged in user
$user_check=$_SESSION['login_user'];
$session_sql="SELECT * FROM Organization WHERE username='$user_check'";
$row=mysqli_fetch_array($session_sql,MYSQLI_ASSOC);
$login_session=$row['username'];
if(!isset($_SESSION['login_user'])){
    header("location:index.php");
}
?>