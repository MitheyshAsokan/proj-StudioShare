<?php
require'connect.php';
session_start();
//saves the session of the current logged in user
$user_check=$_SESSION['creator-login_user'];
$session_sql="SELECT * FROM Staff WHERE Username='$user_check'";
$row=mysqli_fetch_array($session_sql,MYSQLI_ASSOC);
$login_session=$row['Username'];

if(!isset($_SESSION['creator-login_user'])){
    header("location:creator-login.php");
}
?>