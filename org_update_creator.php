<html>
    <body>
        <h1>Update Creator Profile</h1>
        <form action="" method="post">
            Creator Name: <input name="creator_name" type="text"><br><br>
            Username: <input name="username" type="text"><br><br>
            Content Type: <input name="content_type" type="text"><br><br>
            Start Date: <input name="start_date" type="date"><br><br>
            Contract Duration (Years): <input name="duration" type="number"><br><br>
            </select><br><br>
            <input type="submit" value="Update Creator"><br><br>
            <button type="reset" value="Reset">Clear all fields</button>
        </form><br><br>
    <a href="org_creator_page.php">Return to Creator Page</a>
    </body>
</html>

<?php

require 'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];
$creator_id=mysqli_real_escape_string($con,$_GET['creator_id']);
$creator_name=mysqli_real_escape_string($con,$_POST['creator_name']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$password="password";
$content_type=mysqli_real_escape_string($con,$_POST['content_type']);
$start_date=mysqli_real_escape_string($con,$_POST['start_date']);
$duration=mysqli_real_escape_string($con,$_POST['duration']);

if(empty($creator_name)||empty($username)||empty($content_type)
    ||empty($start_date)||empty($duration)
    ||trim($creator_name)==''||trim($username)==''
    ||trim($content_type)==''||trim($start_date)==''||trim($duration)==''){
        echo 'You did not fill out the required fields.';
    die();
}
$query = "UPDATE Creator SET 
          CreatorName = '$creator_name', 
          Username = '$username', 
          ContentType='$content_type', 
          ContractStartDate='$start_date', 
          ContractDuration='$duration' 
          WHERE CreatorID='$creator_id'";

if (mysqli_query($con, $query)) {
    echo "$username updated successfully.";
}
else {
    echo mysqli_error($con);
    echo 'That username is already taken.';
}

mysqli_close($con);
?>