<html>
    <head>
        <title>Staff Space: Welcome to StudioShare</title>
    </head>

    <body>
        <h1>First Time Login</h1>
        <form action="" method="post">
            Enter your Username: <input name="staff-username" type="text"><br><br>
            Enter a preffered password: <input name="staff-password" type="password"><br><br>
            <input type="submit" value="Update Password"><br><br>
        </form>

    <a href="staff-login.php" class="navbar-link">
        <div class="navbar-link-text">Return to Login</div>
    </a>

    <a href="index.php" class="navbar-link">
        <div class="navbar-link-text">Return to Homepage</div>
    </a>

    </body>
</html>

<?php
 require 'connect.php';

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $staffusername=mysqli_real_escape_string($con,$_POST['staff-username']);
    $staffnewpassword=mysqli_real_escape_string($con,$_POST['staff-password']);

    //Searches database for submitted Username and Password
    $query="SELECT * FROM Staff WHERE Username = '$staffusername' AND Password = 'password'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count=mysqli_num_rows($result);

    //If the User is in the database then a new session is created
    if($count===1){
        //Update
        $query2="UPDATE Staff SET `Password` = '$staffnewpassword' WHERE Username = '$staffusername'";
        $result2=mysqli_query($con,$query2);

        header("location: staff-login.php");
    }
    else{
        echo 'Your Username is not in our record!';
    }
}