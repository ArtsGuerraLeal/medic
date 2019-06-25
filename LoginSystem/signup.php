<?php
require "header.php";
 ?>

     <main>
        <h1>Signup</h1>

        <?php
          if(isset($_GET['error'])){
            if($_GET['error']=="emptyfields"){
              echo "<p class = signuperror>Please fill all fields</p>";
            }elseif($_GET['error']=="invalidumailuid"){
              echo "<p class = signuperror>Invalid Username or Email</p>";
            }elseif($_GET['error']=="invalidmail"){
              echo "<p class = signuperror>Invalid Email</p>";
            }elseif($_GET['error']=="invaliduid"){
              echo "<p class = signuperror>Invalid Username</p>";
            }elseif($_GET['error']=="passwordchecks"){
              echo "<p class = signuperror> Passwords don't match</p>";
            }
          }elseif(isset($_GET['signup'])){ {
            if($_GET['signup']=="success"){
              echo "<p class = signupsuccess> Success!</p>";
            }
          }

        }



        ?>


        <form class="form-signup" action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="Username">
            <input type="text" name="mail" placeholder="Email">
            <input type="password" name="pwd" placeholder="Password">
            <input type="password" name="pwd-repeat" placeholder="Confirm Password">
            <button type="submit" name="signup-submit">Signup</button>

        </form>
     </main>

 <?php
 require "footer.php";
  ?>
