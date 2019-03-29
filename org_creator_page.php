<?php
require'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];

$query_creators = "SELECT * From Creator WHERE OrgID = '$org_id'";
$creator_result = mysqli_query($con, $query_creators);

    if (mysqli_num_rows($creator_result) > 0){
        echo "<table><tr><th>Creator Id</th><th>Organization</th><th>Name</th><th>Username</th>
        <th>Content Type</th><th>Contract Start Date</th><th>Contract Duration (Years)</th></tr>";
            while ($row = mysqli_fetch_assoc($creator_result)){
                echo "<tr><td>".$row['CreatorID']."</td>
                <td>".$row['OrganizationName']."</td>
                <td>".$row['CreatorName']."</td>
                <td>".$row['Username']."</td>
                <td>".$row['ContentType']."</td>
                <td>".$row['ContractStartDate']."</td>
                <td>".$row['ContractDuration']."</td>
                <td><a href='edit_org_creator.php'>Edit</a></td>
                <td><a href='delete_org_creator.php'>Delete</a></td></tr>";
            }
        echo "</table>";
    }
    else{
        echo "There are currently no creators under this organization.";
    }
?>
<html>
    <body>
        <a href='org_add_creator.php'>Add New Creator</a><br><br>
        <a href="org_home.php">Return to Organization Home Page</a>
    </body>
</html>
