<?php
require 'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];
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
    <p class="sign" align="center">Create Staff Profile</p>
    <form class="form1" method="post">
        <input class="un" type="text" align="center" placeholder="Staff Name" name="staff_name">
        <input class="un" type="text" align="center" placeholder="Username" name="username">
        <input class="un" type="text" align="center" placeholder="Position" name="position">
        <input class="un" type="date" align="center" placeholder="Start Date" name="start_date">
        <select class="un" name="studio">
            <option value="">Select a studio</option>
            <?php
            $studio_list = "SELECT * FROM Studio WHERE OrgID ='$org_id'";
            $studio_result = mysqli_query($con, $studio_list);
            while($row = mysqli_fetch_assoc($studio_result)) {
                $studio_name = $row['StudioName'];
                ?>
                <option value="<?php echo $studio_name?>"><?php echo $studio_name?></option>
                <?php
            }
            ?>
        </select>
        <input class="submit" type="submit" name="submit" value="Register Staff">
        <p class="forgot" align="center"><a href="org_staff_page.php">Return to Staff Page</p>
</div>

</body>

</html>

<?php

$org_name=$_SESSION['org_name_session'];
$staff_name=mysqli_real_escape_string($con,$_POST['staff_name']);
$username=mysqli_real_escape_string($con,$_POST['username']);
$password="password";
$position=mysqli_real_escape_string($con,$_POST['position']);
$start_date=mysqli_real_escape_string($con,$_POST['start_date']);
$studio=mysqli_real_escape_string($con,$_POST['studio']);

$query = "SELECT * FROM Studio WHERE StudioName='$studio'";
$studio_id_result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($studio_id_result);
$studio_id = $row['StudioID'];

if(empty($staff_name)||empty($username)||empty($position)
    ||empty($start_date)||empty($studio)
    ||trim($staff_name)==''||trim($username)==''
    ||trim($position)==''||trim($start_date)==''||trim($studio)==''){
    die();
}

$query = "INSERT INTO Staff (
          OrgID, 
          OrganizationName, 
          StaffName, 
          Username,
          Password, 
          Position, 
          StartDate, 
          StudioID) 
          VALUES(
          '$org_id', 
          '$org_name', 
          '$staff_name', 
          '$username', 
          '$password',
          '$position', 
          '$start_date', 
          '$studio_id')";

if (mysqli_query($con, $query)) {
    header("location: org_staff_page.php");
}
else {
    echo mysqli_error($con);
}

mysqli_close($con);
?>
