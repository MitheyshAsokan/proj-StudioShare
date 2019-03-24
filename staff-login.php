

<?php
 require 'connect.php';

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $staffusername=mysqli_real_escape_string($con,$_POST['staff-username']);
    $staffpassword=mysqli_real_escape_string($con,$_POST['staff-password']);

    //Searches database for submitted Username and Password
    $query="SELECT * FROM Staff WHERE Username = '$staffusername' AND Password = '$staffpassword'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count=mysqli_num_rows($result);

    //If the User is in the database then a new session is created
    if($count===1){
        $_SESSION['staff-login_user']=$staffusername;
        echo 'Login successful!';
        header("location: staff-profile.php");
    }
    else{
        echo 'Username or password is invalid';
    }
}
 ?>


<html>
    <head>
        <title>Staff Page</title>
    </head>

    <body>
        <h1>Staff Login Page</h1>
        <form action="" method="post">
            Username: <input name="staff-username" type="text"><br><br>
            Password: <input name="staff-password" type="password"><br><br>
            <input type="submit" value="Staff-Log In"><br><br>
        </form>
    </body>
</html>