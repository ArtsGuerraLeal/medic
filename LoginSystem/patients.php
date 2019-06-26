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
            <input type="text" name="firstName" placeholder="First Name...">
            <input type="text" name="lastName" placeholder="Last Name...">
                <select>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
            <input type="date" name="birthDate" >
            <input type="text" name="telephone" placeholder="Client business...">
            <input type="text" name="address" placeholder="Client name...">
            <input type="text" name="religion" placeholder="Client business...">
            <select>
              <option value="single">Single</option>
              <option value="married">Married</option>
            </select>
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
    $sql = "SELECT patientId,firstName,lastName,gender,birthDate,telephone,address,religion,civilStatus FROM patients WHERE userId = " . $userid;
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
        <th>Patient Id</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Birth Date</th>
        <th>Telephone</th>
        <th>Address</th>
        <th>Religion</th>
        <th>Civil Status</th>
        <th></th>
        <th></th>
      </tr>';

      if(mysqli_num_rows($result) > 0){
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
          <td>".$row["patientId"]."</td>
          <td>".$row["firstName"]. " ". $row["lastName"]."</td>
          <td>";
          if($row["gender"]==1){
          echo "Male";
          }else{
          echo "Female";
          }
          echo "</td>
          <td>".$row["birthDate"]."</td>
          <td>".$row["telephone"]."</td>
          <td>".$row["address"]."</td>
          <td>".$row["religion"]."</td>
          <td>".$row["civilStatus"]."</td>
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
