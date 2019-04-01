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
    <p class="sign" align="center">Create New Creator Profile</p>
    <form class="form1" method="post">
        <input class="un" type="text" align="center" placeholder="Creator Name" name="creator_name">
        <input class="un" type="text" align="center" placeholder="Username" name="username">
        <input class="un" type="text" align="center" placeholder="Content Type" name="content_type">
        <input class="un" type="date" align="center" placeholder="Start Date" name="start_date">
        <input class="un" type="number" align="center" placeholder="Contract Duration (Years)" name="duration">
        <input class="submit" type="submit" name="submit" value="Register Creator">
        <p class="forgot" align="center"><a href="org_creator_page.php">Return to Creator Page</p>
</div>

</body>

</html>

<?php

require 'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];
$creator_name=mysqli_real_escape_string($con,$_POST['creator_name']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$password="password";
$content_type=mysqli_real_escape_string($con,$_POST['content_type']);
$start_date=mysqli_real_escape_string($con,$_POST['start_date']);
$duration=mysqli_real_escape_string($con,$_POST['duration']);

if(empty($creator_name)||empty($username)||empty($content_type)
    ||empty($start_date)||empty($duration)
    ||trim($creator_name)==''||trim($username)==''
    ||trim($content_type)==''||trim($start_date)==''||trim($duration)==''){
    die();
}
$query = "INSERT INTO Creator (OrgID, OrganizationName, CreatorName, Username,
          Password, ContentType, ContractStartDate, ContractDuration) 
          VALUES('$org_id', '$org_name', '$creator_name', '$username', '$password', 
           '$content_type', '$start_date','$duration')";

if (mysqli_query($con, $query)) {
    header("location: org_creator_page.php");
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>
