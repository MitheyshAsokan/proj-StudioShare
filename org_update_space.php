<?php

require 'connect.php';
require 'org_session.php';

$space_id = mysqli_real_escape_string($con, $_GET['space_id']);
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
    <p class="sign" align="center">Update Studio Space</p>
    <form class="form1" method="post">
        <input class="un" type="text" align="center" placeholder="Studio Space Name" name="space_name">
        <input class="un" type="text" align="center" placeholder="Space Type" name="space_type">
        <input class="un" type="text" align="center" placeholder="Description" name="space_desc">
        <input class="submit" type="submit" name="submit" value="Update Studio">
        <p class="forgot" align="center"><a href="org_resource_page.php?studio_id=<?php echo $studio_id ?>">Return to Resource Page</p>
</div>

</body>

</html>

<?php
$space_name=mysqli_real_escape_string($con,$_POST['space_name']);
$space_type=mysqli_real_escape_string($con,$_POST['space_type']);
$space_desc=mysqli_real_escape_string($con,$_POST['space_desc']);

if(empty($space_name)||empty($space_type) ||empty($space_desc)
    ||trim($space_name)==''||trim($space_type)==''
    ||trim($space_desc)==''){
    die();
}
$query = "UPDATE Space SET
          SpaceName = '$space_name',
          SpaceDescription = '$space_desc',
          SpaceType = '$space_type'
          WHERE SpaceID = '$space_id'";

if (mysqli_query($con, $query)) {
    header("location: org_resource_page.php?studio_id=$studio_id");
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>