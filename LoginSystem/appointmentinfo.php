<?php
require "header.php";
?>

       <?php

       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 text-gray-800">'. ucwords($_SESSION['userUid'])."'s Treatments".'</h1>
           <p class="mb-4">Add Treatments</p>';

           echo
           //Input Form
           '<div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Treatments</h6>';


            echo '<div class="nav tab">
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab1'" .')" id="defaultOpen">Treatment Info</button>


            </div>';

            echo '</div>

             <div class="card-body">
            <form action="includes/equipment-input.inc.php" method="post">
             <div id="Tab1" class="tabcontent" >
               <div class="form-row">
                 <div class="form-group col-md-6">
                   <label class="my-2 font-weight-bold" for="treatmentname">Treatment Name</label>
                   <input type="text" class="form-control font-weight-light" id="treatmentname" name="treatmentname" placeholder="Treatment Name">

                   <label class="my-2 font-weight-bold" for="treatmentcost">Cost</label>
                   <input type="text" class="form-control font-weight-light" id="treatmentcost" name="treatmentcost" placeholder="Cost">

                   <label class="my-2 font-weight-bold" for="equipmentused">Equipment</label>';

                   $selector = new Selector("equipmentName","equipment",$_SESSION['userId']);
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
               <button type="submit" class="btn btn-primary btn-sm" name="treatment-submit">Save</button>
               <button type="submit" class="btn btn-secondary btn-sm">Cancel</button>
             </div>





            </div>

             </form>


              <div class="form-row">
             <div class=" col-md-2">

             <form action="upload.inc.php" method="post" enctype="multipart/form-data">
             Select image to upload:
             <input type="file"  class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*;capture=camera">
             <button type="submit" class="btn btn-primary btn-sm" name="treatment-submit">Submit</button>
             </form>



           </div>

           <div class=" form-row">';

           $dirname = "uploads/";
           $images = glob($dirname."*.{jpg,gif,png,PNG}",GLOB_BRACE);

           foreach($images as $image) {
               echo '<img class="img-thumbnail" src="'.$image.'" /><br />';
           }



         echo '</div>

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
