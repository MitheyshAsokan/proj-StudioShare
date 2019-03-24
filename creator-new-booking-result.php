
<html>
    <body>

    <a href="creator-new-booking.php" class="navbar-link">
        <div class="navbar-link-text">Return to booking</div>
    </a>


    <a href="creator-profile.php" class="navbar-link">
        <div class="navbar-link-text">Return to profile</div>
    </a>


    <a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
    </a>

    </body>
</html>


<?php 

require 'creator-session.php';
require 'connect.php';
$creatorId=$_SESSION['CreatorID'];
$studioSelection = $_SESSION['StudioSelection'];
$spaceSelection = $_SESSION['SpaceSelection'];

$bookingDescription = $_POST['bookingDescription'];
$configReq = $_POST['configReq'];
$date = $_POST['date'];

//Date settings
$todaysDate = date('Y-m-d');

if(empty($bookingDescription)||empty($configReq)||empty($date)||trim($bookingDescription)==''||trim($configReq)==''||trim($date)==''){
    echo "Missing Field";
    die();
}

if($date < $todaysDate){
    echo "Invalid Date";
    die();
}

//Searches BookingSpace database for submitted bookings that have the same Studio, Space, and Date.
$query="SELECT * FROM BookingSpace WHERE StudioID = '$studioSelection' AND SpaceID = '$spaceSelection' AND CreatorID = '$creatorId' AND BookingDate = '$date'";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$active=$row['active'];
$count=mysqli_num_rows($result);

if($count===1){
    echo 'Date for Booking not available';
}
else{
    //create a new booking by inserting its details into the BookingSpace table
    $query2 = "INSERT INTO BookingSpace (StudioID, SpaceID, CreatorID, BookingDate, BookingDescription, ConfigurationRequest) VALUES('$studioSelection', '$spaceSelection', '$creatorId', '$date', '$bookingDescription', '$configReq')";
    //If registration is successful, user can go to login

    #echo $studioSelection . " " . $spaceSelection . " " . $creatorId . " " . $date . " " . $bookingDescription . " " . $configReq;

    if (mysqli_query($con, $query2)) {
        echo "Booking added successfully.";
        }
    else {
        echo 'DB connection error!';
    }
}

?>






