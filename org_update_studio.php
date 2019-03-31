<html>
<body>
<h1>Update Studio</h1>
<form action="" method="post">
    Studio Name: <input name="studio_name" type="text"><br><br>
    Studio Address: <input name="studio_address" type="text"<br><br>
    Studio Description: <input name="studio_desc" type="text"<br><br>
    </select><br><br>
    <input type="submit" value="Update Studio"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form><br><br>
<a href="org_studio_page.php">Return to Studio Page</a>
</body>
</html>

<?php
require 'connect.php';

$studio_id=mysqli_real_escape_string($con,$_GET['studio_id']);
$studio_name=mysqli_real_escape_string($con,$_POST['studio_name']);
$studio_address=mysqli_real_escape_string($con,$_POST['studio_address']);
$studio_desc=mysqli_real_escape_string($con,$_POST['studio_desc']);

if(empty($studio_name)||empty($studio_address)||empty($studio_desc)
    ||trim($studio_name)==''||trim($studio_address)=='' ||trim($studio_desc)==''){
    echo 'You did not fill out the required fields.';
    die();
}
$query = "UPDATE Studio SET
          StudioName = '$studio_name',
          StudioAddress = '$studio_address',
          StudioDescription = '$studio_desc'
          WHERE StudioID = '$studio_id'";

if (mysqli_query($con, $query)) {
    echo "$studio_name updated successfully.";
}
else {
    echo mysqli_error($con);
    echo 'That Studio Name is already taken.';
}

mysqli_close($con);
?>
