
<?php
 require 'connect.php';

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $creatorusername=mysqli_real_escape_string($con,$_POST['creator-username']);
    $creatorpassword=mysqli_real_escape_string($con,$_POST['creator-password']);

    //Searches database for submitted Username and Password
    $query="SELECT * FROM Creator WHERE Username = '$creatorusername' AND Password = '$creatorpassword'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count=mysqli_num_rows($result);

    //If the User is in the database then a new session is created
    if($count===1){
        $_SESSION['creator-login_user']=$creatorusername;
        echo 'Login successful!';
        header("location: creator-profile.php");
    }
    else{
        echo 'Username or password is invalid';
    }
}
 ?>

<html>
    <head>
        <title>Creator Page</title>
    </head>

    <body>
        <h1>Creator Login Page</h1>
        <form action="" method="post">
            Username: <input name="creator-username" type="text"><br><br>
            Password: <input name="creator-password" type="password"><br><br>
            <input type="submit" value="creator-Log In"><br><br>
        </form>

    <a href="creator-first-login.php" class="navbar-link">
        <div class="navbar-link-text">First time Login</div>
    </a>

    <a href="index.php" class="navbar-link">
        <div class="navbar-link-text">Return to Homepage</div>
    </a>

    </body>
</html>