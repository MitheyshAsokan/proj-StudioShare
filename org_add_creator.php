<html>
    <body>
        <h1>Create New Creator Profile</h1>
        <form action="" method="post">
            Creator Name: <input name="creator_name" type="text"><br><br>
            Username: <input name="username" type="text"<br><br>
            Email: <input name="email" type="text"<br><br>
            Content Type: <input name="content_type" type="text"<br><br>
            Start Date: <input name="start_date" type="date"><br><br>
            Contract Duration (Years): <input name="duration" type="number"><br><br>
            </select><br><br>
            <input type="submit" value="Register Creator"><br><br>
            <button type="reset" value="Reset">Clear all fields</button>
        </form>
    <a href="org_creator_page.php">Return to Creator Page</a>
    </body>
</html>

<?php

require 'connect.php';
$creator_name=mysqli_real_escape_string($con,$_POST['creator_name']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$email=mysqli_real_escape_string($con,$_POST['email']);
$content_type=mysqli_real_escape_string($con,$_POST['content_type']);
$start_date=mysqli_real_escape_string($con,$_POST['start_date']);
$duration=mysqli_real_escape_string($con,$_POST['duration']);

if(empty($creator_name)||empty($username)||empty($email)
    ||empty($start_date)||empty($duration)||trim($username)==''
    ||trim($creator_name)==''||trim($username)==''||trim($email)==''
    ||trim($start_date)==''||trim($duration)==''){
        echo 'You did not fill out the required fields.';
    die();
}
$query = "INSERT INTO Creator (CreatorName, Email, Password, Location) VALUES('$username', '$email', '$password', '$location')";
