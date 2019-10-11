<?php
require "header.php";
?>

       <?php

       //show users of patient
       //change to company and userId in future



       require 'includes/dbh.inc.php';
         $userid = $_SESSION['userId'];
         $sql = "SELECT * FROM appointments ";
         $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt,$sql))
           {
               header("Location: /patientslist.php?error=sqlerror");
               exit();
           }
       else
       {
       $result = mysqli_query($conn, $sql);
       if(isset($_SESSION['userId'])){

           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 text-gray-800">'. ucwords($_SESSION['userUid'])."'s Patients".'</h1>
           <p class="mb-4">Patient List</p>';


           echo '<div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patients</h6>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                         <th>Appointment Id</th>
                         <th>Name</th>
                         <th>Treatment</th>
                         <th>Date</th>
                         <th></th>
                         <th></th>
                     </tr>
                   </thead>
                   <tfoot>
                     <tr>
                     <th>Appointment Id</th>
                     <th>Name</th>
                     <th>Treatment</th>
                     <th>Date</th>
                     <th></th>
                     <th></th>
                     </tr>
                   </tfoot><tbody>';

                   if(mysqli_num_rows($result) > 0)
                   {
                     while ($row = mysqli_fetch_assoc($result))
                     {
                       echo
                       "<tr>
                       <td>".$row["patientId"]."</td>
                       <td>".$row["firstName"]. " ". $row["lastName"]."</td>
                       <td>";



                       echo "</td>
                       <td>".$row["birthDate"]."</td>
                       <td>".$row["telephone"]."</td>
              
                       <td>".

                       '<form class = "client-delete" action="includes/patient-delete.inc.php" method="post">
                       <button class = "btn btn-danger btn-sm" type="submit" name="patient-delete">Delete</button>
                       <input type="hidden" name="patientid" value="'.$row["patientId"].' ">
                       </form>'

                       .
                       "</td>
                       <td>"
                       .'<form class = "client-details" action="includes/client-details.inc.php" method="post">
                       <button class = "btn btn-primary btn-sm" type="submit" name="patient-details">Details</button>
                       <input type="hidden" name="patientid" value="'.$row["patientId"].' ">
                       </form>'
                       ."</td></tr>";
                     }
                   }
                   else
                   {
                     echo "
                     <p> No results</p>";
                   }

               echo '</tbody></table>
               </div>
             </div>
           </div>

         </div>';

       }else
       {
         echo "Somethings wrong...
         <tr>
           <td>Tiger Nixon</td>
           <td>System Architect</td>
           <td>Edinburgh</td>
           <td>61</td>
           <td>2011/04/25</td>
           <td>$320,800</td>
         </tr>
         ";
       }

     }
 ?>


 <?php
 require "footer.php";
?>
