<?php
require 'org_session.php';
require 'connect.php';
$current_user=$_SESSION['login_user'];

?>

<html>
    <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title><?php echo $current_user; ?>'s Profile</title>
    </head>

    <body>
        <div class="main">
            <p class="sign" align="center"><?php echo $current_user; ?>'s Profile</p>
            <p class="forgot" align="center" ><a href="org_studio_page.php">Studios</p>
            <p class="forgot" align="center"><a href="org_creator_page.php">Creators</p>
            <p class="forgot" align="center"><a href="org_staff_page.php">Staff</p>
            <p class="forgot" align="center" ><a href="org_bookings.php">Bookings</p>
            <p class="forgot" align="center" ><a href="logout.php">Sign Out</p> 
                    
        </div> 
    </body> 
</html>
