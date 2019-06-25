<?php
require "header.php";
 ?>


<main>
       <?php
       require 'includes/dbh.inc.php';
       if(isset($_SESSION['userId'])){
         echo '<h1>'. ucwords($_SESSION['userUid'])."'s Hosting". '</h1>';

               if(isset($_GET['error'])){
            }else{
              $userid = $_SESSION['userId'];
              $sql = "SELECT nameClient FROM clients WHERE userId = ".$userid;
              $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt,$sql)){
                header("Location: /hosting.php?error=sqlerror");
                exit();
            }else {
              $result = mysqli_query($conn, $sql);
              if(isset($_SESSION['userId'])){
                if(mysqli_num_rows($result) > 0){

                  echo '<div class = "TestDiv">';
                  echo " <p>Client Name:</p>";
                  echo '<form class = "hosting-add" action="includes/hosting-add.inc.php" method="post">';
                  echo '<select name="client-name">';
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option>'.$row["nameClient"].'</option>';
                  }
                    echo "</select>";
                }
                echo '
                <input type="text" name="hosting-type" placeholder="Hosting Type...">
                <input type="text" name="hosting-cost" placeholder="Hosting Cost...">
                <input type="text" name="hosting-domain" placeholder="Domain Name...">
                <p>Start Date:</p>
                <input type="date" name="hosting-date-start" >
                <p>Renew Date:</p>
                <input type="date" name="hosting-date-renew">
                <button type="submit" name="hosting-add">Add</button>

                </form>';

                echo '</div>';

                  }
               }
            }
          }
         ?>
</main>

<main>

  <?php

    $userid = $_SESSION['userId'];
    $sql = "SELECT clients.nameClient,clients.businessName, hosting.domain, hosting.hostingType, hosting.hostingCost,hosting.hostingDateStart,hosting.hostingDateRenew FROM clients INNER JOIN hosting ON clients.idClient = hosting.idClient AND clients.userId = ".$userid;
    $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: /hosting.php?error=sqlerror");
      exit();
  }else {
    $result = mysqli_query($conn, $sql);

    if(isset($_SESSION['userId'])){
    echo '
      <table class = "clienttable">
      <tr>
        <th>Client Name</th>
        <th>Business Name</th>
        <th>Domain Name</th>
        <th>Type</th>
        <th>Cost</th>
        <th>Start Date</th>
        <th>Renew Date Date</th>
        <th></th>
      </tr>';

      if(mysqli_num_rows($result) > 0){

        while ($row = mysqli_fetch_assoc($result)) {
          $money = $row["hostingCost"];
          echo "<tr>
          <td>".$row["nameClient"]."</td>
          <td>".$row["businessName"]."</td>
          <td>".$row["domain"]."</td>
          <td>".$row["hostingType"]."</td>
          <td>";
          setlocale(LC_MONETARY, 'en_US');
          echo "$" . number_format($money,2) . " MXN" ;
          echo "</td>
          <td>".$row["hostingDateStart"]."</td>
          <td>".$row["hostingDateRenew"]."</td>

          <td>".
          '<form class = "client-details" action="includes/client-details.inc.php" method="post">
          <button type="submit" name="client-details">Details</button>
          </form>'.'<form class = "client-delete" action="includes/client-delete.inc.php" method="post">
          <button type="submit" name="client-delete">Delete</button>
          </form>'.

          "</td>

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
