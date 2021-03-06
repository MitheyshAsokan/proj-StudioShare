<!DOCTYPE html>
<html lang-"en">
<!-- <head>
    <title>Organization Signup</title>
</head>
<body>

<h1>Organization Signup</h1>
<form action="" method="post">
    Organization Name: <input name="orgname" type="text"><br><br>
    Username: <input name="username" type="text"<br><br>
    Password: <input name="password" type="password"><br><br>
    Confirm Password: <input name="confirm-password" type="password"><br><br>
    </select><br><br>
    <input type="submit" value="Register Organization"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form>

<p>If you already have an StudioShare account, click on
<a href='index.php'>Sign In</a><br> -->

<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Register Organization</title>
</head>

<body>
  <div class="main">
        <p class="sign" align="center">Register Organization</p>
        <form class="form1" method="post">

            <input class="un " type="text" align="center" placeholder="Organization Name" name="orgname">
            <input class="un " type="text" align="center" placeholder="Username" name="username">
            <input class="pass" type="password" align="center" placeholder="Password" name="password">
            <input class="pass" type="password" align="center" placeholder="Confirm Password" name="confirm-password">
            <input class="submit" type="submit" name="submit" value="Register">

            <p class="forgot" align="center"><a href="index.php">Return To Homepage</p>
         
    </div>
     

<?php

require 'connect.php';
//sets all form values to variables
$orgname=mysqli_real_escape_string($con, $_POST['orgname']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
$confirmpassword=mysqli_real_escape_string($con,$_POST['confirm-password']);
//checks to make sure all forms are filled out
if(empty($username)||empty($password)||empty($orgname)||trim($username)==''||trim($password)==''||trim($orgname)==''){
    echo "<p class=\"error\"> Missing fields</p>";
    die();
}

if($password != $confirmpassword){

    echo "<p class=\"error\" > Passwords Do Not Match</p>";

}else{
    //create a new user by inserting its details into the User table
    $query = "INSERT INTO Organization (`OrgName`, `Username`, `Password`) VALUES('$orgname', '$username', '$password')";
    //If registration is successful, user can go to login
    if (mysqli_query($con, $query)) {

        $_SESSION['login_user']=$username;
        echo "<p class=\"error\" > Organization Added Successfully</p>";
        header("location: index.php");
    }
    else {
        echo "<p class=\"error\" > Username Is Not Available</p>";
    }
}


mysqli_close($con);
?>


</body>
</html>
