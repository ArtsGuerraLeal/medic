<?php
require "header.php";

?>

<main>
       <?php
       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

         echo '<h1>'. ucwords($_SESSION['userUid'])."'s Treatements". '</h1>';

         if(isset($_GET['error']))
         {
               if($_GET['error']=="emptyfields")
               {
                 echo "<p class = signuperror>Please fill all fields</p>";
               }
               elseif($_GET['error']=="invalidclientName")
               {
                 echo "<p class = signuperror>Invalid Client Name</p>";
               }
               elseif($_GET['error']=="invalidclientBusiness")
               {
                 echo "<p class = signuperror>Invalid Client Business Name</p>";
               }
               elseif(isset($_GET['signup']))
               {
                     if($_GET['signup']=="success")
                     {
                       echo "<p class = signupsuccess> Success!</p>";
                     }
              }
          }

            echo
            //Input Form
            '<form class = "client-add" action="includes/patient-input.inc.php" method="post">
            <input type="text" name="treatementname" placeholder="Equipment Name...">
            <input type="date" name="treatementcost">
            <input type="text" name="treatementcost" placeholder="Equipment Cost...">';



          echo  '
            <button type="submit" name="patient-submit">Add</button>
            </form>';

            }
            else
            {
              echo "Somethings Wrong..";
            }

         ?>
</main>

<main>
  <?php
  //Select patient info and display in the table
  require 'includes/dbh.inc.php';
    $userid = $_SESSION['userId'];
    $sql = "SELECT * FROM equipment";

    $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql))
      {
          header("Location: /equipment.php?error=sqlerror");
          exit();
      }
  else
  {
    $result = mysqli_query($conn, $sql);
    if(isset($_SESSION['userId']))
    {
    echo
    '<table class = "clienttable">
      <tr>
        <th>Equipment Name</th>
        <th>Purchase Date</th>
        <th>Last Use</th>
        <th>Equipment Cost</th>

        <th></th>
        <th></th>
      </tr>';

      if(mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
        {
          echo
          "<tr>
          <td>".$row["equipmentName"]."</td>
          <td>".$row["purchaseDate"]."</td><td>";




          if($row["lastuseDate"]!=NULL)
          {
            echo $row["lastuseDate"];
          }
          else
          {
            echo "Never used";
          }

          echo "</td>  <td>".$row["equipmentCost"]."</td>
          <td>".

          '<form class = "client-delete" action="includes/patient-delete.inc.php" method="post">
          <button type="submit" name="patient-delete">Delete</button>
          <input type="hidden" name="patientid" value="'.$row["patientId"].' ">
          </form>'

          .
          "</td>
          <td>"
          .'<form class = "client-details" action="includes/client-details.inc.php" method="post">
          <button type="submit" name="patient-details">Details</button>
          <input type="hidden" name="patientid" value="'.$row["patientId"].' ">
          </form>'
          ."</td>
          </tr>";
        }
      }
      else
      {
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
