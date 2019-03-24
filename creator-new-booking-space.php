<?php 
 require 'creator-session.php';
 require 'connect.php';
 $creatorusername=$_SESSION['creator-login_user'];

 session_start();
 $_SESSION['StudioSelection'] = $_POST['Studio'];

 $studioSelection = $_SESSION['StudioSelection'];

 $query="SELECT * FROM Space WHERE StudioID = '$studioSelection'";
 $result=mysqli_query($con,$query);

?>

<html>
<head>
    <title><?php echo $creatorusername; ?>'s Profile</title>
</head>
<body style="margin: 5px;">
<h1>StudioShare: Creator Space</h1>
<h2>Create your new booking</h2>

<h3>Select A Studio Space</h2>

<form action="creator-new-booking-form.php" method="post">
<table>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Type</th>
            <th>Select</th>
        </tr>
        <?php
        //We can change this as we go.
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            echo "<tr>";
            echo "<td>" . $row['SpaceName'] . "</td>";
            echo "<td>" . $row['SpaceDescription'] . "</td>";
            echo "<td>" . $row['SpaceType'] . "</td>";
            echo "<td><input type=\"radio\" name=\"Space\" value=". $row['SpaceID'] ."></td>";
            echo "</tr>";
        }
        ?>
</table>

<input type="submit" name="submit" value="Done">
</form>

<a href="logout.php" class="navbar-link">
        <div class="navbar-link-text">Sign Out</div>
</a>
</body>
</html>