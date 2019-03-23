<?php

require 'connect.php';
session_start();
//checks to see if the entered username and password match up in the user table.  If true, user is logged in.
if($_SERVER['REQUEST_METHOD']=='POST'){
    $loginusername=mysqli_real_escape_string($con,$_POST['username']);
    $loginpassword=mysqli_real_escape_string($con,$_POST['password']);

    $query="SELECT * FROM Organization WHERE Username = '$loginusername' AND Password = '$loginpassword'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count=mysqli_num_rows($result);

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
        <title>Login Page</title>
    </head>

    <body>
        <h1>Login Page</h1>
        <form action="" method="post">
            Username: <input name="username" type="text"><br><br>
            Password: <input name="password" type="password"><br><br>
            <input type="submit" value="Log In"><br><br>
        </form>
    </body>
</html>