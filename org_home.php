<?php
require 'org_session.php';
require 'connect.php';
$current_user=$_SESSION['login_user'];
?>
<html>
<head>
    <title><?php echo $current_user; ?>'s Profile</title>
</head>
<body style="margin: 5px;">
<h1><?php echo $current_user; ?>'s Profile</h1>
<div class="navbar">
    <a href="org_studio.php" class="navbar-link">
        <div class="navbar-link-text">Studios</div>
    </a>
    <a href="org_creator_page.php" class="navbar-link">
        <div class="navbar-link-text">Creators</div>
    </a>
    <a href="org_staff_page.php" class="navbar-link">
        <div class="navbar-link-text">Staff</div>
    </a>
    <a href="trusted_sellers.php" class="navbar-link">
        <div class="navbar-link-text">Bookings</div>
    </a>
    <a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
    </a>
</div>
</div>
</body>
</html>
