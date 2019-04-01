<html>
<body>
<h1>Update Studio Space</h1>
<form action="" method="post">
    Space Name: <input name="space_name" type="text"><br><br>
    Space Type: <input name="space_type" type="text"<br><br>
    Description: <input name="space_desc" type="text"<br><br>
    X Dimension: <input name="x_dim" type="number"><br><br>
    Y Dimension: <input name="y_dim" type="number"><br><br>
    Z Dimension: <input name="z_dim" type="number"><br><br>
    </select><br><br>
    <input type="submit" value="Update Space"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form><br><br>
</body>
</html>

<?php

require 'connect.php';
require 'org_session.php';

$space_id = mysqli_real_escape_string($con, $_GET['space_id']);
$studio_id = mysqli_real_escape_string($con, $_GET['studio_id']);

echo "<br>";
echo "<a href=org_resource_page.php?studio_id="
    .$studio_id.">".
    "Return to resource page</a>";
echo "<br>";

$space_name=mysqli_real_escape_string($con,$_POST['space_name']);
$space_type=mysqli_real_escape_string($con,$_POST['space_type']);
$space_desc=mysqli_real_escape_string($con,$_POST['space_desc']);
$x_dim=mysqli_real_escape_string($con,$_POST['x_dim']);
$y_dim=mysqli_real_escape_string($con,$_POST['x_dim']);
$z_dim=mysqli_real_escape_string($con,$_POST['x_dim']);

if(empty($space_name)||empty($space_type)
    ||empty($space_desc)||empty($x_dim)
    ||empty($y_dim)||empty($z_dim)
    ||trim($space_name)==''||trim($space_type)==''
    ||trim($space_desc)==''||trim($x_dim)==''
    ||trim($y_dim)==''||trim($z_dim)==''){
    echo 'You did not fill out the required fields.';
    die();
}
$query = "UPDATE Space SET
          SpaceName = '$space_name',
          DimensionX = '$x_dim',
          DimensionY = '$y_dim',
          DimensionZ = '$z_dim',
          SpaceDescription = '$space_desc',
          SpaceType = '$space_type'
          WHERE SpaceID = '$space_id'";

if (mysqli_query($con, $query)) {
    echo "$space_name updated successfully.";
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>