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
            <h1><?php echo $current_user; ?>'s Profile</h1>
            <div class="navbar">
                <a href="org_studio_page.php" class="navbar-link">
                    <div class="navbar-link-text">Studios</div>
                </a>
                <a href="org_creator_page.php" class="navbar-link">
                    <div class="navbar-link-text">Creators</div>
                </a>
                <a href="org_staff_page.php" class="navbar-link">
                    <div class="navbar-link-text">Staff</div>
                </a>
                <a href="org_bookings.php" class="navbar-link">
                    <div class="navbar-link-text">Bookings</div>
                </a>
                <a href="logout.php" class="navbar-link">
                    <div class="navbar-link-text">Sign Out</div>
                </a>
            </div>
            </div>
        </div>
    </body>
</html>

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
    <p class="sign" align="center">Sign In</p>
    <form class="form1" method="post">
      <input class="un " type="text" align="center" placeholder="Username" name="username">
      <input class="pass" type="password" align="center" placeholder="Password" name="password">
      <input class="submit" type="submit" name="submit" value="Sign In">

      <p class="forgot" align="center"><a href="org_sign_up.php">Studios</p>
      <p class="forgot" align="center"><a href="creator-login.php">Creators</p>
      <p class="forgot" align="center"><a href="staff-login.php">Staff</p>
      <p class="forgot" align="center"><a href="staff-login.php">Bookings</p>
      <p class="forgot" align="center"><a href="staff-login.php">Sign Out</p>
            
    </div>
     
</body>

</html>
