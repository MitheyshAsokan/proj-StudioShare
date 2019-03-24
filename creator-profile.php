<?php
 require 'creator-session.php';
 require 'connect.php';
 $creatorusername=$_SESSION['creator-login_user'];
?>



<h1>This is <?php echo $creatorusername; ?> profile</h1>