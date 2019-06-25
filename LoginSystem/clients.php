<?php
require "header.php";
 ?>

<main>
       <?php
       if(isset($_SESSION['userId'])){
         echo '<h1>'. ucwords($_SESSION['userUid'])."'s Clients". '</h1>';
         if(isset($_GET['error'])){
           if($_GET['error']=="emptyfields"){
             echo "<p class = signuperror>Please fill all fields</p>";
           }elseif($_GET['error']=="invalidclientName"){
             echo "<p class = signuperror>Invalid Client Name</p>";
           }elseif($_GET['error']=="invalidclientBusiness"){
             echo "<p class = signuperror>Invalid Client Business Name</p>";
           }elseif(isset($_GET['signup'])){ {
           if($_GET['signup']=="success"){
             echo "<p class = signupsuccess> Success!</p>";
           }
          }
          }
          }
            echo '<form class = "client-add" action="includes/client-input.inc.php" method="post">
            <input type="text" name="clientname" placeholder="Client name...">
            <input type="text" name="clientbusiness" placeholder="Client business...">
            <button type="submit" name="client-submit">Add</button>
            </form>';

            }else{
              echo "Kept you waiting huh?";
            }
         ?>
</main>

<main>
  <?php

  require 'includes/dbh.inc.php';
    $userid = $_SESSION['userId'];
    $sql = "SELECT nameClient,businessName FROM clients WHERE userId = " . $userid;
    $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: /clients.php?error=sqlerror");
      exit();
  }else {
    $result = mysqli_query($conn, $sql);

    if(isset($_SESSION['userId'])){
    echo '
      <table class = "clienttable">
      <tr>
        <th>Client Name</th>
        <th>Business Name</th>
      </tr>';

      if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
          <td>".$row["nameClient"]."</td>
          <td>".$row["businessName"]."</td>
          </tr>";
        }
        
      }else {
        echo "</table>
        <p> No results</p>";
      };
        }
     }
?>
</main>

 <?php
 require "footer.php";
  ?>
