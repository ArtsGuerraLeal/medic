<?php
require "header.php";
 ?>

     <main>

       <?php
       if(isset($_SESSION['userId'])){
            echo '<p class=login-status>You are looogged in!!</p>';

            }else{
              echo '<p class=logout-status>You are logged out!</p>';
            }
        ?>

     </main>

 <?php
 require "footer.php";
  ?>
