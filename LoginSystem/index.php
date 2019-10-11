<?php
//require "header.php";
 //?>
 <?php
 session_start();
  ?>

       <?php
       //Show if User is logged in
      if(isset($_SESSION['userId'])){
        header("Location: ../dashboard.php");

            }else{
              header("Location: ../landing.php");



            }
        ?>


 <?php
/// require "footer.php";
  ?>
