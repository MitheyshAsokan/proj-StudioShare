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
    <title><?php echo $creatorusername; ?>'s Profile</title>
</head>
<body style="margin: 5px;">
<h1>StudioShare: Creator Space</h1>
<h2>Create your new booking</h2>

<h3>Enter Booking Details</h2>

<form action="creator-new-booking-result.php" method="post">
    Booking Description: <input name="bookingDescription" type="text"><br><br>
    Configuration Request <input name="configReq" type="text"<br><br>
    Date <input name="date" type="date"><br><br>
    </select><br><br>
    <input type="submit" value="Finalize Booking"><br><br>
    <button type="reset" value="Reset">Clear all fields</button>
</form>

<a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
</a>

</body>
</html>



