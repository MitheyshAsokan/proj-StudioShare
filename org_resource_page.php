<html>
    <head>
    <link rel="stylesheet" href="style2.css">
</head>

<?php

require 'connect.php';
require 'org_session.php';

$studio_id = mysqli_real_escape_string($con, $_GET['studio_id']);
$org_id=$_SESSION['org_id_session'];
$org_name=$_SESSION['org_name_session'];

$query_space = "SELECT * From Space WHERE StudioID = '$studio_id'";
$space_result = mysqli_query($con, $query_space);

if (mysqli_num_rows($space_result) > 0){
    echo "<table><tr><th>Space ID</th>
                     <th>Space Name</th>
                     <th>Space Description</th>
                     <th>Space Type</th>
                     </tr>";
    while ($row = mysqli_fetch_assoc($space_result)){
        $space_id = $row['SpaceID'];
        echo "<tr>
                <td>".$space_id."</td>
                <td>".$row['SpaceName']."</td>
                <td>".$row['SpaceDescription']."</td>
                <td>".$row['SpaceType']."</td>
                <td><form action='' method='post'>
                <input type='hidden' name='space_id' value='$row[SpaceID]'>
                <input type='submit' name='delete_space' value='Delete'>
                <a href=org_update_space.php?space_id=$space_id&studio_id=$studio_id>Edit</a>
                </form></td></tr>";
    }
    echo "</table>";
}
else{
    echo "<br><br>";
    echo "There are currently no spaces assigned to this studio";
    echo "<br><br>";
}

if(isset($_POST['delete_space'])) {
    $to_delete = $_POST['space_id'];
    $delete_space = "DELETE FROM Space WHERE SpaceID='$to_delete'";
    echo "<meta http-equiv='refresh' content='1'>";
    if (mysqli_query($con, $delete_space)) {
        echo "Space successfully deleted.";
    } else {
        echo "Error deleting Space.";
    }
}

echo "<a href=org_add_studio_space.php?studio_id="
    .$studio_id.">".
    "Add space to studio</a>";


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
            $resource_id = $row['ResourceID'];
            echo "<tr>
                    <td>".$resource_id."</td>
                    <td>".$row['ResourceName']."</td>
                    <td>".$row['ResourceType']."</td>
                    <td>".$row['ResourceDescription']."</td>
                    <td>".$row['UnitsAvailable']."</td>
                    <td><form action='' method='post'>
                    <input type='hidden' name='resource_id' value='$row[ResourceID]'>
                    <input type='submit' name='delete_resource' value='Delete'>
                    <a href=org_update_resource.php?resource_id=$resource_id&studio_id=$studio_id>Edit</a>
                    </form></td></tr>";
        }
        echo "</table>";
    }
    else{
        echo "<br><br>";
        echo "There are currently no resources assigned to this studio";
        echo "<br><br>";
    }
    
    if(isset($_POST['delete_resource'])) {
        $to_delete = $_POST['resource_id'];
        $delete_resource = "DELETE FROM Resources WHERE ResourceID='$to_delete'";
        echo "<meta http-equiv='refresh' content='1'>";
        if (mysqli_query($con, $delete_resource)) {
            echo "Resource successfully deleted.";
        } else {
            echo "Error deleting Resource.";
        }
    }
    
    echo "<a href=org_add_resource_page.php?studio_id="
        .$studio_id.">".
        "Add resources to studio</a>";    

?>
    <body>
        <br><br>
        <a href="org_studio_page.php">Return to Studio Page</a>
        <br><br>
    </body>
</html>
