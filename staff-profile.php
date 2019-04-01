<?php
 require 'staff-session.php';
 require 'connect.php';
 $staffusername=$_SESSION['staff-login_user'];

 //Searches database for submitted Username and Password
    $query="SELECT * FROM Staff WHERE Username = '$staffusername'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

        $staffname = $row['StaffName'];
        $studioId = $row['StudioID'];
        $orgname = $row['OrganizationName'];

    //Second querry to grab all the bookings associated with the staff's studio.  
    
    //Date settings
    $todaysDate = date('Y-m-d');

    //Querry filters out of date bookings.
    $query2="SELECT * FROM BookingSpace WHERE StudioID = '$studioId' AND BookingDate >= '$todaysDate' ORDER BY BookingDate";
    $result2=mysqli_query($con,$query2);
?>


<html>
    
<head>
    <link rel="stylesheet" href="style2.css">
    <title>StudioShare</title>
    <h1>StudioShare: Staff Space</h1>
</head>
<body>
    <h2>Welcome, <?php echo $staffname; ?></h2>
    <h2>Your organization, <?php echo $orgname; ?></h2>

    <p>Scheduled Bookings</p>
    <table>
        <tr>
            <th>Date</th>
            <th>Description</th>
            <th>Configurations</th>
            <th>Creator</th>
        </tr>
        <?php
        //We can change this as we go.
        while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>" . $row2['BookingDate'] . "</td>";
            echo "<td>" . $row2['BookingDescription'] . "</td>";
            echo "<td>" . $row2['ConfigurationRequest'] . "</td>";
            echo "<td>" . $row2['CreatorID'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>


</body>
</html>