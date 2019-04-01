<?php
 require 'creator-session.php';
 require 'connect.php';
 $creatorusername=$_SESSION['creator-login_user'];

 $query="SELECT * FROM Creator WHERE Username = '$creatorusername'";
 $result=mysqli_query($con,$query);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

 $creatorname = $row['CreatorName'];
 $orgname = $row['OrganizationName'];

?>

<!-- <html>
<head>
    <title><?php echo $creatorusername; ?>'s Profile</title>
</head>

<body style="margin: 5px;">
<h1>StudioShare: Creator Space</h1>
<h2>Welcome, <?php echo $creatorname;?></h2>
<h2>Your Organization: <?php echo $orgname;?></h2>
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
</html> -->

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title><?php echo $creatorusername; ?>'s Profile</title>
    </head>

    <body>
        <div class="main">
            <p class="sign" align="center">StudioShare: Creator Space</p>
            <p class="sign" align="center">Welcome, <?php echo $creatorname;?></p>
            <p class="sign" align="center">Your Organization: <?php echo $orgname;?></p>
            <p class="forgot" align="center" ><a href="creator-bookings.php">Bookings</p>
            <p class="forgot" align="center"><a href="creator-new-booking.php">New Bookings</p>
            <p class="forgot" align="center" ><a href="logout.php">Sign Out</p> 
                    
        </div> 
    </body> 
</html>