<?php
 require 'creator-session.php';
 require 'connect.php';
 $creatorusername=$_SESSION['creator-login_user'];

 $query="SELECT * FROM Creator WHERE Username = '$creatorusername'";
 $result=mysqli_query($con,$query);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

 $creatorname = $row['CreatorName']

?>

<html>
<head>
    <title><?php echo $creatorusername; ?>'s Profile</title>
</head>
<body style="margin: 5px;">
<h1>StudioShare: Creator Space</h1>
<h2>Welcome, <?php echo $creatorname;?></h2>
<div class="navbar">
    <a href="creator-bookings.php" class="navbar-link">
        <div class="navbar-link-text">Bookings</div>
    </a>
    <a href="creator-new-booking.php" class="navbar-link">
        <div class="navbar-link-text">New Booking</div>
    </a>
    <a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
    </a>
</div>
</div>
</body>
</html>