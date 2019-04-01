<html>
<body>
<h1>Add new space to studio</h1>
<form action="" method="post">
    Space Name: <input name="space_name" type="text"><br><br>
    Space Type: <input name="space_type" type="text"<br><br>
    Description: <input name="space_desc" type="text"<br><br>
    X Dimension: <input name="x_dim" type="number"><br><br>
    Y Dimension: <input name="y_dim" type="number"><br><br>
    Z Dimension: <input name="z_dim" type="number"><br><br>
    </select><br><br>
    <input type="submit" value="Add Space"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form><br><br>
</body>
</html>

<?php

require 'connect.php';
require 'org_session.php';

$studio_id = mysqli_real_escape_string($con, $_GET['studio_id']);
$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];

echo "<br>";
echo "<a href=org_resource_page.php?studio_id="
    .$studio_id.">".
    "Return to studio page</a>";
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
$query = "INSERT INTO Space(
          `SpaceName`,
          `StudioID`, 
          `OrgID`, 
          `DimensionX`, 
          `DimensionY`,
          `DimensionZ`, 
          `SpaceDescription`,
          `SpaceType`) 
          VALUES(
          '$space_name',
          '$studio_id', 
          '$org_id', 
          '$x_dim', 
          '$y_dim', 
          '$z_dim',
          '$space_desc',
          '$space_type')";

if (mysqli_query($con, $query)) {
    echo "$space_name added successfully.";
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>