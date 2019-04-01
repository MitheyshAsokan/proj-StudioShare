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

 $query2="SELECT * FROM BookingSpace WHERE StudioID = '$studioSelection' AND SpaceID = '$spaceSelection'";
 $result2=mysqli_query($con,$query2);

?>
<html>

<head>
    <link rel="stylesheet" href="style3.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>StudioShare</title>
</head>

<body>


<h3 id="MainOne">Current Bookings for Selected Studio and Space:</h2>
<table>
        <tr>
            <th>Booking Date</th>
            <th>Creator Email</th>
        </tr>
        <?php
        //We can change this as we go.
        while($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>" . $row['BookingDate'] . "</td>";

            $creatorId = $row['CreatorID'];

            $query3="SELECT * FROM Creator WHERE CreatorID = '$creatorId'";
            $result3=mysqli_query($con,$query3);
            $row3=mysqli_fetch_array($result3,MYSQLI_ASSOC);


            echo "<td>" . $row3['Username'] . "</td>";
            echo "</tr>";
        }
        ?>
</table>


<div class="main">
    <p class="sign" align="center">Create Your New Booking</p>
    <form class="form1" action="creator-new-booking-result.php" method="post">
        <input class="un" type="text" align="center" placeholder="Booking Description" name="bookingDescription">
        <input class="un" type="text" align="center" placeholder="Studio Space Setup Request" name="configReq">
        <input class="un" type="date" align="center" placeholder="Date" name="date">
        <input class="submit" type="submit" name="submit" value="Finalize Booking">
        <p class="forgot" align="center"><a href="creator-new-booking.php">Return to Studio Selection</p>
        <p class="forgot" align="center"><a href="logout.php">Logout</p>
</div>

</body>

</html>




