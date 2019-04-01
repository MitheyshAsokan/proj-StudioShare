<?php

require 'connect.php';
require 'org_session.php';

$resource_id = mysqli_real_escape_string($con, $_GET['resource_id']);
$studio_id = mysqli_real_escape_string($con, $_GET['studio_id']);
?>

<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>StudioShare</title>
</head>

<body>
<div class="main">
    <p class="sign" align="center">Add New Resource</p>
    <form class="form1" method="post">
        <input class="un" type="text" align="center" placeholder="Resource Name" name="resource_name">
        <input class="un" type="text" align="center" placeholder="Resource Type" name="resource_type">
        <input class="un" type="text" align="center" placeholder="Description" name="resource_desc">
        <input class="un" type="number" align="center" placeholder="Units Available" name="units">
        <input class="submit" type="submit" name="submit" value="Add Studio">
        <p class="forgot" align="center"><a href="org_resource_page.php?studio_id=<?php echo $studio_id ?>">Return to Resource Page</p>
</div>

</body>

</html>

<?php

$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];

echo "<br>";
echo "<a href=org_resource_page.php?studio_id="
    .$studio_id.">".
    "Return to studio page</a>";
echo "<br>";

$resource_name=mysqli_real_escape_string($con,$_POST['resource_name']);
$resource_type=mysqli_real_escape_string($con,$_POST['resource_type']);
$resource_desc=mysqli_real_escape_string($con,$_POST['resource_desc']);
$units=mysqli_real_escape_string($con,$_POST['units']);

if(empty($resource_name)||empty($resource_type)
    ||empty($resource_desc)||empty($units)
    ||trim($resource_name)==''||trim($resource_type)==''
    ||trim($resource_desc)==''||trim($units)==''){
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
    header("location: org_resource_page.php?studio_id=$studio_id");
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>
