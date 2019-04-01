<?php
 require 'connect.php';

session_start();
//If a user session is already active, redirects to the item home page.
if(isset($_SESSION['login_user'])){
    header('Location:org_home.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $loginusername=mysqli_real_escape_string($con,$_POST['username']);
    $loginpassword=mysqli_real_escape_string($con,$_POST['password']);

    //Searches database for submitted Username and Password
    $query="SELECT * FROM Organization WHERE Username = '$loginusername' AND Password = '$loginpassword'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count=mysqli_num_rows($result);

    //If the User is in the database then a new session is created
    if($count===1){
        $_SESSION['login_user']=$loginusername;
        echo 'Login successful!';
        header("location: org_home.php");
    }
    else{
        echo 'Username or password is invalid';
    }
}
 ?>

<html>
<head>
    <title>StudioShare</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <br><h1>StudioShare</h1>
</head>
<body>
<div class="login">
    <h1>LOGIN</h1>
    <form action="" method="post">
        <p>USERNAME</p>
        <input name="username" type="text" placeholder="ENTER USERNAME">
        <p>PASSWORD</p>
        <input name="password" type="password" placeholder="ENTER PASSWORD">
        <input type="submit" name="submit" value="Login">
        <a href="org_sign_up.php">Join StudioShare</a><br>

        <a href="creator-login.php">Log in as creator</a><br>
        <a href="staff-login.php">Log in as staff</a>
    </form>
</div>
</body>
</html>
