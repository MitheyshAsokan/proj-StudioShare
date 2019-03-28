<html>
<body>
<h1>Create New Staff Profile</h1>
<form action="" method="post">
    Staff Name: <input name="staff_name" type="text"><br><br>
    Username: <input name="username" type="text"<br><br>
    Position: <input name="position" type="text"<br><br>
    Start Date: <input name="start_date" type="date"><br><br>
    Studio Number: <input name="studio" type="number"><br><br>
    </select><br><br>
    <input type="submit" value="Register Staff"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form><br><br>
<a href="org_staff_page.php">Return to Staff Page</a>
</body>
</html>

<?php

require 'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];
$staff_name=mysqli_real_escape_string($con,$_POST['staff_name']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$password="password";
$position=mysqli_real_escape_string($con,$_POST['position']);
$start_date=mysqli_real_escape_string($con,$_POST['start_date']);
$studio=mysqli_real_escape_string($con,$_POST['studio']);

if(empty($staff_name)||empty($username)||empty($position)
    ||empty($start_date)||empty($studio)
    ||trim($staff_name)==''||trim($username)==''
    ||trim($position)==''||trim($start_date)==''||trim($studio)==''){
    echo 'You did not fill out the required fields.';
    die();
}
$query = "INSERT INTO Staff (OrgID, OrganizationName, StaffName, Username,
          Password, Position, StartDate, StudioID) 
          VALUES('$org_id', '$org_name', '$staff_name', '$username', '$password',
           '$position', '$start_date' '$studio')";

if (mysqli_query($con, $query)) {
    echo "$username added successfully.";
}
else {
    echo mysqli_error($con);
    echo 'That username is already taken.';
}

mysqli_close($con);
?>
