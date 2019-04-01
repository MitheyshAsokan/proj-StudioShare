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
    <p class="sign" align="center">Update Resource Information</p>
    <form class="form1" method="post">
        <input class="un" type="text" align="center" placeholder="Resource Name" name="resource_name">
        <input class="un" type="text" align="center" placeholder="Resource Type" name="resource_type">
        <input class="un" type="text" align="center" placeholder="Description" name="resource_desc">
        <input class="un" type="number" align="center" placeholder="Units Available" name="units">
        <input class="submit" type="submit" name="submit" value="Update Resource">
        <p class="forgot" align="center"><a href="org_resource_page.php?studio_id=<?php echo $studio_id ?>">Return to Resource Page</p>
</div>

</body>

</html>

<?php

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
$query = "UPDATE Resources SET
          ResourceName = '$resource_name',
          ResourceType = '$resource_type',
          ResourceDescription = '$resource_desc',
          UnitsAvailable = '$units'
          WHERE ResourceID = '$resource_id'";

if (mysqli_query($con, $query)) {
    header("location: org_resource_page.php?studio_id=$studio_id");
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>
