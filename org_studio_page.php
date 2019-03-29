<?php
require'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];

$query_studios = "SELECT * From Studio WHERE OrgID = '$org_id'";
$studio_result = mysqli_query($con, $query_studios);

if (mysqli_num_rows($studio_result) > 0){
    echo "<table><tr><th>Studio Id</th>
                     <th>Studio Name</th>
                     <th>Studio Address</th>
                     <th>Studio Description</th>
                     </tr>";
    while ($row = mysqli_fetch_assoc($studio_result)){
        echo "<tr>
                <td>".$row['StudioID']."</td>
                <td>".$row['StudioName']."</td>
                <td>".$row['StudioAddress']."</td>
                <td>".$row['StudioDescription']."</td>
                <td><a href=org_resource_page.php?studio_id=".$row['StudioID'].">"."Go to Studio Page</a></td>
              </tr>";
    }
    echo "</table>";
}
else{
    echo "There are currently no studios under this organization.";
}
?>
<html>
    <body>
        <a href='org_add_studio.php'>Add New Studio Space</a><br><br>
        <a href="org_home.php">Return to Organization Home Page</a>
    </body>
</html>
