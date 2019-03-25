<?php
require'connect.php';
session_start();
//saves the session of the current logged in user
$user_check=$_SESSION['login_user'];
$session_sql="SELECT * FROM Organization WHERE Username='$user_check'";
$result=mysqli_query($con, $session_sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

$login_session=$row['username'];
$_SESSION['org_name_session']=$row['OrgName'];
$_SESSION['org_id_session']=$row['OrgID'];

if(!isset($_SESSION['login_user'])){
    header("location:index.php");
}
?>