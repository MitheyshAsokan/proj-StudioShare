<?php
    require 'connect.php';
    require 'org_session.php';

    $org_id=$_SESSION['org_id_session'];

    $query="SELECT * FROM Organization WHERE OrgID = '$org_id'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $orgId = $row['OrgID'];

    //Date Settings.
    $todaysDate = date('Y-m-d');


    $query2="SELECT * FROM BookingSpace WHERE OrgID = '$orgId' AND BookingDate >= '$todaysDate' ORDER BY BookingDate";
    $result2=mysqli_query($con,$query2);
    $query3="SELECT BookingDate, StudioName, SpaceName, CreatorName, BookingDescription, ConfigurationRequest FROM BookingSpace JOIN Studio JOIN Space JOIN Creator Where BookingSpace.StudioID = Studio.StudioID AND BookingSpace.SpaceID = Space.SpaceID AND BookingSpace.CreatorID = Creator.CreatorID Order By BookingDate"
    $result3=mysqli_query($con,$query3);
?>


<html>
<head>
    <title> </title>
</head>
<body style="margin: 5px;">
<h1>StudioShare: Organization Bookings</h1>
<h2>Your Bookings</h2>


<table>
        <tr>
            <th>Date</th>
            <th>Studio      </th>
            <th>Space     </th>
            <th>Creator</th>
            <th>Description</th>
            <th>Configurations</th>
        </tr>
        <?php
        //We can change this as we go.
        while($row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC)){

            echo "<tr>";
            echo "<td>" . $row3['BookingDate'] . "</td>";
            echo "<td>" . $row3['StudioName'] . "</td>";
            echo "<td>" . $row3['SpaceName'] . "</td>";
            echo "<td>" . $row3['CreatorName'] . "</td>";
            echo "<td>" . $row3['BookingDescription'] . "</td>";
            echo "<td>" . $row3['ConfigurationRequest'] . "</td>";
            echo "</tr>";
        }
        ?>
</table>
<a href="org_home.php">Return to Organization Home Page</a>
<a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
</a>

</body>
</html>