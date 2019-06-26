<?php
require "header.php";
 ?>

     <main>
       <?php
       //Show if User is logged in
       if(isset($_SESSION['userId'])){
            echo '<h1 class=login-status>Welcome</h1>';
            echo '<img src="img/underconstruction.png" alt="nya">';

            }else{
              echo '<h1 class=logout-status>Please be patient</h1>';
              echo '<img src="img/underconstruction.png" alt="nya">';
            }
        ?>
     </main>

 <?php
 require "footer.php";
  ?>
