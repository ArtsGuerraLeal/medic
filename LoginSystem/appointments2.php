<?php
require "header.php";
require "lib/selector.class.php";
?>

<main>
       <?php
       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

         echo '<h1>'. ucwords($_SESSION['userUid'])."'s Appointments". '</h1>';

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



            //Search Form
            echo '<form class = "client-add" action="includes/appointment-input.inc.php" method="post">

            <input type="text" name="patientId" placeholder="Patient ID...">
            <input type="text" name="firstName" placeholder="First Name...">
            <input type="text" name="lastName" placeholder="Last Name...">
            <p>Birthdate: </p>
            <input type="date" name="birthDate" >';


             echo "<p>Treatement: </p>";
             $selector = new Selector("treatmentName","treatments",1);
             $selector->Show();


            echo '<button type="submit" name="client-submit">Search</button>
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
    $sql = "SELECT * FROM appointments";
    $stmt = mysqli_stmt_init($conn);
  if(!mysqli_stmt_prepare($stmt,$sql))
      {
          header("Location: /appointments.php?error=sqlerror");
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
        <th>Appointment ID</th>
        <th>Patient ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Treatement</th>
        <th>Appointments Date</th>
        <th></th>
        <th></th>
      </tr>';

      if(mysqli_num_rows($result) > 0)
      {
        while ($row = mysqli_fetch_assoc($result))
        {
          echo
          "<tr>
          <td>".$row["appointmentId"]."</td>
          <td>".$row["patientId"]."</td>
          <td>".$row["firstName"]. " ". $row["lastName"]."</td>
          <td>";
echo $row["age"];
          echo "</td>
          <td>";

          date_default_timezone_set("America/New_York");
          $transdate = date('m-d-Y', time());
          $d = date_parse_from_format("Y-m-d",$row["birthDate"]);
          $month = $d["month"];
          $year = $d["year"];
          $age =  date("Y") - $year;

        //  echo $age;

          echo $row["treatmentId"];

          echo "</td>
          <td>". $row["appointmentDate"] ."</td>


          <td>".

          '<form class = "client-delete" action="includes/client-delete.inc.php" method="post">
          <button type="submit" name="client-delete">Delete</button>
          <input type="hidden" name="idClient" value="'.$row["idClient"].' ">
          </form>'

          .
          "</td>
          <td>"
          .'<form class = "client-details" action="includes/client-details.inc.php" method="post">
          <button type="submit" name="client-details">Details</button>
          <input type="hidden" name="idClient" value="'.$row["idClient"].' ">
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
