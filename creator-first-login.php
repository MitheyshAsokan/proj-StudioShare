<html>
    <head>
        <title>Creator Space: Welcome to StudioShare</title>
    </head>

    <body>
        <h1>First Time Login</h1>

        <form action="" method="post">
            Enter your Username: <input name="creator-username" type="text"><br><br>
            Enter a preffered password: <input name="creator-password" type="password"><br><br>
            Confirm password: <input name="confirm-password" type="password"><br><br>
            <input type="submit" value="Update Password"><br><br>
        </form>

    <a href="creator-login.php" class="navbar-link">
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

    //FIX THIS!!! Password confirmation!!!
    $creatorusername=mysqli_real_escape_string($con,$_POST['creator-username']);
    $creatorpassword=mysqli_real_escape_string($con,$_POST['creator-password']);
    $confirmpassword=mysqli_real_escape_string($con,$_POST['confirm-password']);

    if ($creatorpassword != $confirmpassword){
        echo "Passwords do not match!";
    }else{
        //Searches database for submitted Username and Password
        $query="SELECT * FROM Creator WHERE Username = '$creatorusername' AND Password = 'password'";
        $result=mysqli_query($con,$query);
        $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active=$row['active'];
        $count=mysqli_num_rows($result);

        //If the User is in the database then a new session is created
        if($count===1){
            //Update
            $query2="UPDATE Creator SET `Password` = '$creatorpassword' WHERE Username = '$creatorusername'";
            $result2=mysqli_query($con,$query2);

            header("location: creator-login.php");
        }
        else{
            echo 'Your Username is not in our record!';
        }
    }

    
}