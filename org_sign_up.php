<!DOCTYPE html>
<html lang-"en">
<head>
    <title>Organization Signup</title>
</head>
<body>

<h1>Organization Signup</h1>
<form action="" method="post">
    Organization Name: <input name="orgname" type="text"><br><br>
    Username: <input name="username" type="text"<br><br>
    Password: <input name="password" type="password"><br><br>
    </select><br><br>
    <input type="submit" value="Register Organization"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form>

<p>If you already have an StudioShare account, click on
<a href='index.php'>Sign In</a><br>



<?php

require 'connect.php';
//sets all form values to variables
$orgname=mysqli_real_escape_string($con, $_POST['orgname']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$password=mysqli_real_escape_string($con,$_POST['password']);
//checks to make sure all forms are filled out
if(empty($username)||empty($password)||empty($orgname)||trim($username)==''||trim($password)==''||trim($orgname)==''){
    echo 'You did not fill out the required fields.';
    die();
}
//create a new user by inserting its details into the User table
$query = "INSERT INTO Organization (`OrgName`, `Username`, `Password`) VALUES('$orgname', '$username', '$password')";
//If registration is successful, user can go to login
if (mysqli_query($con, $query)) {
    echo "$username added successfully.";
}
else {
    echo 'Username is not available.';
}

mysqli_close($con);
?>


</body>
</html>
