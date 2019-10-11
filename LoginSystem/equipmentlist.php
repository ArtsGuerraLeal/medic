<?php
require "header.php";
?>

       <?php

       //show users of patient
       //change to company and userId in future



       require 'includes/dbh.inc.php';
         $userid = $_SESSION['userId'];
         $companyId = $_SESSION['companyId'];
         $sql = "SELECT * FROM equipment WHERE companyId = " . $companyId;
         $stmt = mysqli_stmt_init($conn);
       if(!mysqli_stmt_prepare($stmt,$sql))
           {
               header("Location: /equipmentlist.php?error=sqlerror");
               exit();
           }
       else
       {
       $result = mysqli_query($conn, $sql);
       if(isset($_SESSION['userId'])){

           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 text-gray-800">'. ucwords($_SESSION['userUid'])."'s Equipment".'</h1>
           <p class="mb-4">Equipment List</p>';


           echo '<div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Equipment</h6>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                         <th>Equipment Name</th>
                         <th>Purchase Date</th>
                         <th>Last Use</th>
                         <th>Equipment Cost</th>
                         <th></th>
                         <th></th>
                     </tr>
                   </thead>
                   <tfoot>
                     <tr>
                     <th>Equipment Name</th>
                     <th>Purchase Date</th>
                     <th>Last Use</th>
                     <th>Equipment Cost</th>
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
                       <td>".$row["equipmentName"]."</td>
                       <td>".$row["purchaseDate"]. "</td>

                       <td>".$row["lastuseDate"]."</td>
                       <td>$".$row["equipmentCost"]."</td>

                       <td>".

                       '<form class = "client-delete" action="includes/patient-delete.inc.php" method="post">
                       <button class = "btn btn-danger btn-sm" type="submit" name="patient-delete">Delete</button>
                       <input type="hidden" name="patientid" value="'.$row["equipmentId"].' ">
                       </form>'

                       .
                       "</td>
                       <td>"
                       .'<form class = "client-details" action="includes/client-details.inc.php" method="post">
                       <button class = "btn btn-primary btn-sm" type="submit" name="patient-details">Details</button>
                       <input type="hidden" name="patientid" value="'.$row["equipmentId"].' ">
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
         echo "Somethings wrong...";
       }

     }
 ?>


 <?php
 require "footer.php";
?>
