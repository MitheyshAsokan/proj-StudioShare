<?php
 require 'creator-session.php';
 require 'connect.php';
 $creatorusername=$_SESSION['creator-login_user'];

 $query="SELECT * FROM Creator WHERE Username = '$creatorusername'";
 $result=mysqli_query($con,$query);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

 $creatorname = $row['CreatorName'];
 $creatorId = $row['CreatorID'];

    //Date settings
    $todaysDate = date('Y-m-d');

    //Querry filters out by date. (Out of date bookings are not rendered)
    $query2="SELECT * FROM BookingSpace WHERE CreatorID = '$creatorId' AND BookingDate >= '$todaysDate' ORDER BY BookingDate";
    $result2=mysqli_query($con,$query2);

?>

<html>
<head>
    <link rel="stylesheet" href="style2.css">
    <title><?php echo $creatorusername; ?>'s Profile</title>
</head>
<body style="margin: 5px;">
<h1>StudioShare: Creator Space</h1>
<h2>Your Bookings</h2>


<table>
        <tr>
            <th>Date</th>
            <th>Studio</th>
            <th>Space</th>
            <th>Description</th>
            <th>Configurations</th>
        </tr>
        <?php
        //We can change this as we go.
        while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
            echo "<tr><td>".$row2['BookingDate'] . "</td>
            <td>" . $row2['StudioID'] . "</td>
            <td>" . $row2['SpaceID'] . "</td>
            <td>" . $row2['BookingDescription'] . "</td>
            <td>" . $row2['ConfigurationRequest'] . "</td>
            <td><form action='' method='post'>
                <input type='hidden' name='id' value='$row[BookingID]'>
                <input type='submit' name='delete_booking' value='Delete'></form></td></tr>";
        }

        if(isset($_POST['delete_booking'])) {
            $to_delete = $_POST['id'];
            $delete_item = "DELETE FROM BookingSpace WHERE BookingID='$to_delete'";
            echo "<meta http-equiv='refresh' content='1'>";
            if (mysqli_query($con, $delete_item)) {
                echo "Booking successfully deleted.";
            } else {
                echo "Error deleting booking.";
            }
        }
        ?>
</table>

<br>
<a href="creator-profile.php" class="navbar-link">
        <div class="navbar-link-text">Return to creator profile</div>
</a>

<a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
</a>

</body>
</html>