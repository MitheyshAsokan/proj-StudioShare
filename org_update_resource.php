<html>
<body>
<h1>Update Resource</h1>
<form action="" method="post">
    Resource Name: <input name="resource_name" type="text"><br><br>
    Resource Type: <input name="resource_type" type="text"<br><br>
    Description: <input name="resource_desc" type="text"<br><br>
    Units Available: <input name="units" type="number"><br><br>
    </select><br><br>
    <input type="submit" value="Update Resource"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form><br><br>
</body>
</html>

<?php

require 'connect.php';
require 'org_session.php';
$resource_id = mysqli_real_escape_string($con, $_GET['resource_id']);

echo "<a href=org_resource_page.php?studio_id="
    .$studio_id.">".
    "Return to resource page</a>";

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
$query = "UPDATE Resources SET
          ResourceName = '$resource_name',
          ResourceType = '$resource_type',
          ResourceDescription = '$resource_desc',
          UnitsAvailable = '$units'
          WHERE ResourceID = '$resource_id'";

if (mysqli_query($con, $query)) {
    echo "$resource_name updated successfully.";
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>
