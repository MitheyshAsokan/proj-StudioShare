<?php
require'connect.php';
require 'org_session.php';

$org_id=$_SESSION['org_id_session'];
$creator_id=$_SESSION['creator_id_session'];

$query_creators = "DELETE * From Creator WHERE OrgID = '$org_id' AND CreatorID = '$creator_id'";
$creator_result = mysqli_query($con, $query_creators);

