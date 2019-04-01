

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
        echo "<p class=\"error\" > Sign In Successful</p>";
        header("location: staff-profile.php");
    }
    else{
        echo "<p class=\"error\" > Invalid Password or Username</p>";
    }
}
 ?>

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Staff Sign In</title>
    </head>

    <body>
    <div class="main">
        <p class="sign" align="center">Staff Sign In</p>
        <form class="form1" method="post">
        <input class="un " type="text" align="center" placeholder="Username" name="staff-username">
        <input class="pass" type="password" align="center" placeholder="Password" name="staff-password">
        <input class="submit" type="submit" name="submit" value="Sign In">

        <p class="forgot" align="center"><a href="staff-first-login.php">Sign Up</p>
        <p class="forgot" align="center"><a href="index.php">Return To Homepage</p>
                
        </div>
        
    </body>
</html>

<!-- </html>

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

        <a href="staff-first-login.php" class="navbar-link">
        <div class="navbar-link-text">First time Login</div>
        </a>

    <a href="index.php" class="navbar-link">
        <div class="navbar-link-text">Return to Homepage</div>
    </a>
    </body>
</html> -->