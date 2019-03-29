<?php

require 'connect.php';
require 'org_session.php';

$studio_id = mysqli_real_escape_string($con, $_GET['studio_id']);
$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];

$query_resources = "SELECT * From Resources WHERE StudioID = '$studio_id'";
$resources_result = mysqli_query($con, $query_resources);

if (mysqli_num_rows($resources_result) > 0){
    echo "<table><tr><th>Resource Id</th>
                     <th>Resource Name</th>
                     <th>Resource Type</th>
                     <th>Resource Description</th>
                     <th>Units Available</th>
                     </tr>";
    while ($row = mysqli_fetch_assoc($resources_result)){
        echo "<tr>
                <td>".$row['ResourceID']."</td>
                <td>".$row['ResourceName']."</td>
                <td>".$row['ResourceType']."</td>
                <td>".$row['ResourceDescription']."</td>
                <td>".$row['UnitsAvailable']."</td>
              </tr>";
    }
    echo "</table>";
}
else{
    echo "There are currently no resources assigned to this studio";
}
echo "<a href=org_add_resource_page.php?studio_id="
    .$studio_id.">".
    "Add resources to studio</a>";

$query_space = "SELECT * From Space WHERE StudioID = '$studio_id'";
$space_result = mysqli_query($con, $query_space);

if (mysqli_num_rows($space_result) > 0){
    echo "<table><tr><th>Space ID</th>
                     <th>Space Name</th>
                     <th>Space Description</th>
                     <th>Space Type</th>
                     </tr>";
    while ($row = mysqli_fetch_assoc($space_result)){
        echo "<tr>
                <td>".$row['SpaceID']."</td>
                <td>".$row['SpaceName']."</td>
                <td>".$row['SpaceDescription']."</td>
                <td>".$row['SpaceType']."</td>
              </tr>";
    }
    echo "</table>";
}
else{
    echo "There are currently no spaces assigned to this studio";
}
echo "<a href=org_add_studio_space.php?studio_id="
    .$studio_id.">".
    "Add space to studio</a>"

?>
<html>
    <body>
        <a href="org_studio_page.php">Return to Studio Page</a>
    </body>
</html>
