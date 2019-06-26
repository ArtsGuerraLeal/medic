<?php
session_start();
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

<header>

<nav class="nav-header-main">

  <a class="header-logo" href="index.php">
    <img src="img/logo3.png" alt="logo" width="60" height="60">
  </a>
  <ul class="nav-links">
    <li> <a class="active" href="index.php">Home</a> </li>

    <?php
    if(isset($_SESSION['userId'])){
      echo '<li> <a href="patients.php">Patients</a> </li>
        <li> <a href="#">Appointments</a> </li>
        <li> <a href="#">Calendar</a> </li>
        <li> <a href="#">Treatements</a> </li>
        <li> <a href="#">Equipment</a> </li>

        <li> <a href="#">Users</a> </li>';
    }
?>

  </ul>
  <div class="header-login">

 <?php
 if(isset($_SESSION['userId'])){
   echo '<p>'. ucwords($_SESSION['userUid']). '</p>';
   echo '<form class = "form-logout" action="includes/logout.inc.php" method="post">
               <button type="submit" name="logout-submit">Logout</button>
             </form>';
      }else{
        echo '<form class = "form-login" action="includes/login.inc.php" method="post">
          <input type="text" name="mailuid" placeholder="Username/Email...">
          <input type="password" name="pwd" placeholder="Password...">
          <button type="submit" name="login-submit">Login</button>
          <a href="signup.php">Signup</a>
        </form>';
      }

   ?>
</div>


</nav>

</header>
