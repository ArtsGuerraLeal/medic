<?php
require "header.php";
 ?>

<main>
       <?php
       if(isset($_SESSION['userId'])){
         echo '<h1>'. ucwords($_SESSION['userUid'])."'s Patients". '</h1>';
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
    $sql = "SELECT patientId,firstName,lastName FROM patients WHERE userId = " . $userid;
    $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: /patients.php?error=sqlerror");
      exit();
  }else {
    $result = mysqli_query($conn, $sql);

    if(isset($_SESSION['userId'])){
    echo '
      <table class = "clienttable">
      <tr>
        <th>Client Name</th>
        <th>Business Name</th>
        <th></th>
        <th></th>
      </tr>';

      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
          <td>".$row["nameClient"]."</td>
          <td>".$row["businessName"]."</td>
          <td>".
          '<form class = "client-delete" action="includes/client-delete.inc.php" method="post">
          <button type="submit" name="client-delete">Delete</button>
          <input type="hidden" name="idClient" value="'.$row["idClient"].' ">
          </form>'.
          "</td>
          <td>".'<form class = "client-details" action="includes/client-details.inc.php" method="post">
          <button type="submit" name="client-details">Details</button>
          <input type="hidden" name="idClient" value="'.$row["idClient"].' ">
          </form>'."</td>
          </tr>";
        }

      }else {
        echo "</table>
        <p> No results</p>";
      }
        }
     }
?>
</main>

 <?php
 require "footer.php";
  ?>