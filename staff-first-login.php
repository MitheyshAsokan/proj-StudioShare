<!-- <html>
    <head>
        <title>Staff SignUp</title>
    </head>

    <body>
        <h1>Staff Sign Up</h1>
        <form action="" method="post">
            Enter your Username: <input name="staff-username" type="text"><br><br>
            Enter a preffered password: <input name="staff-password" type="password"><br><br>
            Confirm password: <input name="confirm-password" type="password"><br><br>
            <input type="submit" value="Update Password"><br><br>
        </form>

    <a href="staff-login.php" class="navbar-link">
        <div class="navbar-link-text">Return to Login</div>
    </a>

    <a href="index.php" class="navbar-link">
        <div class="navbar-link-text">Return to Homepage</div>
    </a>

    </body>
</html> -->

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Staff Sign Up</title>
    </head>

    <body>
    <div class="main">
        <p class="sign" align="center">Staff Sign Up</p>
        <form class="form1" method="post">
        <input class="un " type="text" align="center" placeholder="Provided Username" name="staff-username">
        <input class="pass" type="password" align="center" placeholder="Password" name="staff-password">
        <input class="pass" type="password" align="center" placeholder="Confirm Password" name="confirm-password">
        <input class="submit" type="submit" name="submit" value="Sign Up">

        <p class="forgot" align="center"><a href="staff-login.php">Return To Staff Sign In</p>
        <p class="forgot" align="center"><a href="index.php">Return To Homepage</p>
                
        </div>
        
    </body>
</html>

<?php
 require 'connect.php';

session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    $staffusername=mysqli_real_escape_string($con,$_POST['staff-username']);
    $staffnewpassword=mysqli_real_escape_string($con,$_POST['staff-password']);
    $confirmpassword=mysqli_real_escape_string($con,$_POST['confirm-password']);

    if($staffnewpassword != $confirmpassword){
        echo "<p class=\"error\" > Passwords Do Not Match</p>";

    }else{
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
            echo "<p class=\"error\" > Username Not Valid</p>";
        }
    }

    
}