<?php
require'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];

$query_staff = "SELECT * From Staff WHERE OrgID = '$org_id'";
$staff_result = mysqli_query($con, $query_staff);

if (mysqli_num_rows($staff_result) > 0){
    echo "<table><tr><th>Staff Id</th><th>Name</th><th>Username</th>
          <th>Position</th><th>Contract Start Date</th><th>Studio Number</th></tr>";
    while ($row = mysqli_fetch_assoc($staff_result)){
        echo "<tr><td>".$row['StaffID']."</td>
                <td>".$row['StaffName']."</td>
                <td>".$row['Username']."</td>
                <td>".$row['Position']."</td>
                <td>".$row['StartDate']."</td>
                <td>".$row['StudioID']."</td></tr>";
    }
    echo "</table>";
}
else{
    echo "There are currently no staff members under this organization.";
}
?>
<html>
<body>
<a href='org_add_staff.php'>Add New Staff</a><br><br>
<a href="org_home.php">Return to Organization Home Page</a>
</body>
</html>
