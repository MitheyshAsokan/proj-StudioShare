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
                <td>".$row['StudioID']."</td>
                <td><form action='' method='post'>
                <input type='hidden' name='id' value='$row[StaffID]'>
                <input type='submit' name='delete_staff' value='Delete'>
                <a href=org_update_staff.php?staff_id=".$row['StaffID'].">Edit</a></form></td></tr>";
    }
    echo "</table>";
}
else{
    echo "There are currently no staff members under this organization.";
}

if(isset($_POST['delete_staff'])) {
    $to_delete = $_POST['id'];
    $delete_item = "DELETE FROM Staff WHERE StaffID='$to_delete'";
    echo "<meta http-equiv='refresh' content='1'>";
    if (mysqli_query($con, $delete_item)) {
        echo "Staff successfully deleted.";
    } else {
        echo "Error deleting staff.";
    }
}

?>
<html>
    <body>
        <a href='org_add_staff.php'>Add New Staff</a><br><br>
        <a href="org_home.php">Return to Organization Home Page</a>
    </body>
</html>
