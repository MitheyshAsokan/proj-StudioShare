<?php
 require 'staff-session.php';
 require 'connect.php';
 $staffusername=$_SESSION['staff-login_user'];

 //Searches database for submitted Username and Password
 $query="SELECT * FROM Staff WHERE Username = '$staffusername'";
 $result=mysqli_query($con,$query);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

    $staffname = $row['StaffName'];
    $orgid = $row['OrgID']
?>


<html>
<head>
    <title>StudioShare</title>
    <h1>StudioShare: Staff Space</h1>
</head>
<body>
    <h2>Welcome <?php echo $staffname; ?></h2>

    <p>Scheduled Bookings</p>


</body>
</html>