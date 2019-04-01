<?php
 require 'connect.php';

session_start();
//If a user session is already active, redirects to the item home page.
if(isset($_SESSION['login_user'])){
    header('Location:org_home.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $loginusername=mysqli_real_escape_string($con,$_POST['username']);
    $loginpassword=mysqli_real_escape_string($con,$_POST['password']);

    //Searches database for submitted Username and Password
    $query="SELECT * FROM Organization WHERE Username = '$loginusername' AND Password = '$loginpassword'";
    $result=mysqli_query($con,$query);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    $active=$row['active'];
    $count=mysqli_num_rows($result);

    //If the User is in the database then a new session is created
    if($count===1){
        $_SESSION['login_user']=$loginusername;
        echo "<p class=\"error\" >Sign In Successful</p>";
        header("location: org_home.php");
    }
    else{
        echo "<p class=\"error\" > Invalid Username Or Password</p>";
    }
}
 ?>

<html>

<head>
  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>StudioShare</title>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Sign In</p>
    <form class="form1" method="post">
      <input class="un " type="text" align="center" placeholder="Username" name="username">
      <input class="pass" type="password" align="center" placeholder="Password" name="password">
      <input class="submit" type="submit" name="submit" value="Sign In">

      <p class="forgot" align="center"><a href="org_sign_up.php">Join StudioShare</p>
      <p class="forgot" align="center"><a href="creator-login.php">Creator Sign In</p>
      <p class="forgot" align="center"><a href="staff-login.php">Staff Sign In</p>
            
    </div>
     
</body>

</html>

