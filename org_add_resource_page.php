<html>
<body>
<h1>Add new resource to studio</h1>
<form action="" method="post">
    Resource Name: <input name="resource_name" type="text"><br><br>
    Resource Type: <input name="resource_type" type="text"<br><br>
    Description: <input name="resource_desc" type="text"<br><br>
    Units Available: <input name="units" type="number"><br><br>
    </select><br><br>
    <input type="submit" value="Add Resource"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form><br><br>
<a href="org_resource_page.php.php">Return to Resource Page</a>
</body>
</html>

<?php

require 'connect.php';
require 'org_session.php';

$studio_id = mysqli_real_escape_string($con, $_GET['studio_id']);
$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];

$resource_name=mysqli_real_escape_string($con,$_POST['resource_name']);
$resource_type=mysqli_real_escape_string($con,$_POST['resource_type']);
$resource_desc=mysqli_real_escape_string($con,$_POST['resource_desc']);
$units=mysqli_real_escape_string($con,$_POST['units']);

if(empty($resource_name)||empty($resource_type)
    ||empty($resource_desc)||empty($units)
    ||trim($resource_name)==''||trim($resource_type)==''
    ||trim($resource_desc)==''||trim($units)==''){
    echo 'You did not fill out the required fields.';
    die();
    }
$query = "INSERT INTO Resources(
          `StudioID`,
          `OrgID`, 
          `OrganizationName`, 
          `ResourceName`, 
          `ResourceType`,
          `ResourceDescription`, 
          `UnitsAvailable`) 
          VALUES(
          '$studio_id',
          '$org_id', 
          '$org_name', 
          '$resource_name', 
          '$resource_type', 
          '$resource_desc',
          '$units')";

if (mysqli_query($con, $query)) {
    echo "$resource_name added successfully.";
}
else {
    echo mysqli_error($con);
    echo 'That resource name is already taken.';
}

mysqli_close($con);
?>
