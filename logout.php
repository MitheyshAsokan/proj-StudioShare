<?php
session_start();
//destroy user's session on logout and returns them to the index page.
if(session_destroy()){
    header("Location:index.php");
}
?>