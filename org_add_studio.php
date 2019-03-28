<html>
<body>
<h1>Add New Studio Space</h1>
<form action="" method="post">
    Studio Name: <input name="studio_name" type="text"><br><br>
    Studio Address: <input name="studio_address" type="text"<br><br>
    Studio Description: <input name="studio_desc" type="text"<br><br>
    </select><br><br>
    <input type="submit" value="Add Studio Space"><br><br>
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
$studio_name=mysqli_real_escape_string($con,$_POST['studio_name']);
$studio_address=mysqli_real_escape_string($con,$_POST['studio_address']);
$studio_desc=mysqli_real_escape_string($con,$_POST['studio_desc']);

if(empty($studio_name)||empty($studio_address)||empty($studio_desc)
    ||trim($studio_name)==''||trim($studio_address)=='' ||trim($studio_desc)==''){
    echo 'You did not fill out the required fields.';
    die();
}
$query = "INSERT INTO Studio (`OrgID`, `OrganizationName`, `StudioName`,
 `        StudioAddress`, `StudioDescription`) 
          VALUES('$org_id', '$org_name', '$studio_name',
          '$studio_adress', '$studio_desc')";

if (mysqli_query($con, $query)) {
    echo "$studio_name added successfully.";
}
else {
    echo mysqli_error($con);
    echo 'That Studio Name is already taken.';
}

mysqli_close($con);
?>
