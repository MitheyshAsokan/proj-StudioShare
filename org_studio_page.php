<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>


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
        echo "
                <td>".$row['StudioID']."</td>
                <td>".$row['StudioName']."</td>
                <td>".$row['StudioAddress']."</td>
                <td>".$row['StudioDescription']."</td>
                <td><a href=org_resource_page.php?studio_id="
                    .$row['StudioID'].
                ">View resources and spaces</a></td>
                <td><form action='' method='post'>
                <input type='hidden' name='studio_id' value='$row[StudioID]'>
                <input type='submit' name='delete_studio' value='Delete'>
                <a href=org_update_studio.php?studio_id=".$row['StudioID'].">Edit</a>
                </form></td></tr>";
    }
    echo "</table>";
}
else{
    echo "<br><br>";
    echo "There are currently no studios under this organization.";
    echo "<br><br>";
}

if(isset($_POST['delete_studio'])) {
    $to_delete = $_POST['studio_id'];
    $delete_studio = "DELETE FROM Studio WHERE StudioID='$to_delete'";
    echo "<meta http-equiv='refresh' content='1'>";
    if (mysqli_query($con, $delete_studio)) {
        echo "Studio successfully deleted.";
    } else {
        echo "Error deleting studio.";
    }
}

?>

    <body>
    <br><br>
        <a href='org_add_studio.php'>Add New Studio</a><br><br>
        <a href="org_home.php">Return to Organization Home Page</a>
    </body>
</html>
