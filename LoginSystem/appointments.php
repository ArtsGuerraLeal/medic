<?php
require "header.php";
?>

       <?php

       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 text-gray-800">'. ucwords($_SESSION['userUid'])."'s Apointments".'</h1>
           <p class="mb-4">Add Treatments</p>';

           echo
           //Input Form
           '<div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Appointments</h6>';


            echo '<div class="nav tab">
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab1'" .')" id="defaultOpen">Appointment Info</button>
                </div>';

            echo '</div>
             <div class="card-body">
            <form action="includes/appointment-input.inc.php" method="post">
             <div id="Tab1" class="tabcontent" >
               <div class="form-row">
                 <div class="form-group col-md-6">';


                   echo '<label class="my-2 font-weight-bold" for="treatmentname">Patient ID</label> ';
                   $selector = new Selector("patientId","patients",$_SESSION['companyId'],"patientid");
                   $selector->Show();

                   echo '<label class="my-2 font-weight-bold" for="treatmentcost">Cost</label>
                   <input type="text" class="form-control font-weight-light" id="treatmentcost" name="treatmentcost" placeholder="Cost">

                   <label class="my-2 font-weight-bold" for="appointmentdate">Date</label>

                   <input type="date" class="form-control" id="appointmentdate" name="appointmentdate">
                   <label class="my-2 font-weight-bold" for="appointmentdate">Time</label>

                   <input type="time" class="form-control" id="appointmentdate" name="appointmenttime">




                   <label class="my-2 font-weight-bold" for="treatmentcost">Discount</label>
                   <input type="text" class="form-control font-weight-light" id="discount" name="treatmentdiscount" placeholder="Discount">';

                   echo '<label class="my-2 font-weight-bold" for="equipmentused">Treatment 1</label>';

                   $selector = new Selector("treatmentName","treatments",$_SESSION['companyId'],"treatment1");
                   $selector->Show();

                   echo '<label class="my-2 font-weight-bold" for="equipmentused">Treatment 2</label>';

                   $selector = new Selector("treatmentName","treatments",$_SESSION['companyId'],"treatment2");
                   $selector->Show();

                   echo '<label class="my-2 font-weight-bold" for="equipmentused">Treatment 3</label>';

                   $selector = new Selector("treatmentName","treatments",$_SESSION['companyId'],"treatment3");
                   $selector->Show();

                   echo '<label class="my-2 font-weight-bold" for="equipmentused">Treatment 4</label>';

                   $selector = new Selector("treatmentName","treatments",$_SESSION['companyId'],"treatment4");
                   $selector->Show();





                   echo '

                 </div>
               </div>

               <div class="form-row"> </div>

             </div>

            <div id="Tab2" class="tabcontent">
              <div class="form-row">
                <div class="form-group col-md-2">

                  <label class="my-2 font-weight-bold" for="birthdate">Birthdate</label>
                  <input type="date" class="form-control" id="birthdate" name="birthdate">

                  <label class="my-2 font-weight-bold" for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender">
                    <option selected>Male</option>
                    <option>Female</option>
                  </select>

                  <label class="my-2 font-weight-bold" for="religion">Religion</label>
                  <input type="text" class="form-control" id="religion" placeholder="Religion">

                    <label class="my-2 font-weight-bold" for="civilstatus">Civil Status</label>
                    <select id="civilstatus" class="form-control" name="civilstatus">
                      <option selected>Single</option>
                      <option>Married</option>
                    </select>

                </div>
               </div>
              </div>

             <div id="Tab3" class="tabcontent">

             </div>

             <div class="form-group col-md-2">
               <button type="submit" class="btn btn-primary btn-sm" name="treatment-submit">Add</button>
               <button type="submit" class="btn btn-secondary btn-sm">Cancel</button>
             </div>

             </form>

           </div>
           </div>
           </div>';



       }else {
         echo "Somethings wrong...";
       }
 ?>



 <script>
 document.getElementById("defaultOpen").click();
 </script>



 <?php
 require "footer.php";
?>
