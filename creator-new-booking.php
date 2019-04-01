<?php
 require 'creator-session.php';
 require 'connect.php';
 $creatorusername=$_SESSION['creator-login_user'];

 $query="SELECT * FROM Creator WHERE Username = '$creatorusername'";
 $result=mysqli_query($con,$query);
 $row=mysqli_fetch_array($result,MYSQLI_ASSOC);

 $creatorname = $row['CreatorName'];
 $creatorId = $row['CreatorID'];
 $orgId = $row['OrgID'];

 session_start();
 $_SESSION['CreatorID'] = $creatorId;
 $_SESSION['OrgID'] = $orgId;

    //Date settings
    $todaysDate = date('Y-m-d');
    
    //Pull up all the studios available
    $query2="SELECT * FROM Studio WHERE OrgID = '$orgId'";
    $result2=mysqli_query($con,$query2);
?>

<html>
<head>
    <link rel="stylesheet" href="style2.css">
    <title><?php echo $creatorusername; ?>'s Profile</title>
</head>
<body style="margin: 5px;">
<h1>StudioShare: Creator Space</h1>
<h2>Create your new booking</h2>

<h3>Select A Studio</h2>

<form action="creator-new-booking-space.php" method="post">
<table>
        <tr>
            <th>Name</th>
            <th>Address</th>
            <th>Description</th>
            <th>Select</th>
        </tr>
        <?php
        //We can change this as we go.
        while($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>" . $row2['StudioName'] . "</td>";
            echo "<td>" . $row2['StudioAddress'] . "</td>";
            echo "<td>" . $row2['StudioDescription'] . "</td>";
            echo "<td><input type=\"radio\" name=\"Studio\" value=". $row2['StudioID'] ."></td>";
            echo "</tr>";
        }
        ?>
</table>
<br><br>
<input type="submit" name="submit" value="Confirm Selection">
</form>

<br>
<a href="creator-profile.php" class="navbar-link">
        <div class="navbar-link-text">Return to creator profile</div>
</a>

<a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
</a>
</body>
</html>