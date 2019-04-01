<?php 
 require 'creator-session.php';
 require 'connect.php';
 $creatorusername=$_SESSION['creator-login_user'];
 $studioSelection = $_SESSION['StudioSelection'];

 $query="SELECT * FROM Creator WHERE Username = '$creatorusername'";
 $result=mysqli_query($con,$query);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
 $creatorId = $row['CreatorID'];

 session_start();
 $_SESSION['SpaceSelection'] = $_POST['Space'];
 $spaceSelection = $_SESSION['SpaceSelection'];
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
    <p class="sign" align="center">Create Your New Booking</p>
    <form class="form1" action="creator-new-booking-result.php" method="post">
        <input class="un" type="text" align="center" placeholder="Booking Description" name="bookingDescription">
        <input class="un" type="text" align="center" placeholder="Studio Space Setup Request" name="configReq">
        <input class="un" type="date" align="center" placeholder="Date" name="date">
        <input class="submit" type="submit" name="submit" value="Finalize Booking">
        <p class="forgot" align="center"><a href="logout.php">Logout</p>
</div>

</body>

</html>




