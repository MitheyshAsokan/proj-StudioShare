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
    <p class="sign" align="center">Add New Studio</p>
    <form class="form1" method="post">
        <input class="un" type="text" align="center" placeholder="Studio Name" name="studio_name">
        <input class="un" type="text" align="center" placeholder="Studio Address" name="studio_address">
        <input class="un" type="text" align="center" placeholder="Description" name="studio_desc">
        <input class="submit" type="submit" name="submit" value="Add Studio">
        <p class="forgot" align="center"><a href="org_studio_page.php">Return to Studio Page</p>
</div>

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
          `StudioAddress`, `StudioDescription`) 
          VALUES('$org_id', '$org_name', '$studio_name',
          '$studio_address', '$studio_desc')";

if (mysqli_query($con, $query)) {
    header("location: org_studio_page.php");
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>
