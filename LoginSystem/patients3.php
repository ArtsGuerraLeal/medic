<?php
require "header.php";
?>

       <?php


       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

           echo '
            <div class="container-fluid">
            <h1 class="h3 mb-0 text-gray-800">'. ucwords($_SESSION['userUid'])."'s Patients".'</h1> <p class="mb-4">Patient List</p>

      <div class="row">

          <div class="card shadow mb-4 col-lg">
          <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Patients</h6><div class="nav tab">
           <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab1'" .')" id="defaultOpen">Contact Info</button>
           <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab2'" .')">Details</button>
           <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab3'" .')">Other</button>

         </div>


          <div class="card-body ">
            <form action="includes/patient-input.inc.php" method="post">


              <div id="Tab1" class="tabcontent" >
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label class="my-2 font-weight-bold" for="firstname">First Name</label>
                    <input type="text" class="form-control font-weight-light" id="firstname" name="firstname" placeholder="First Name">

                    <label class="my-2 font-weight-bold" for="lastname">Last Name</label>
                    <input type="text" class="form-control font-weight-light" id="lastname" name="lastname" placeholder="Last Name">

                    <label class="my-2 font-weight-bold" for="address">Address</label>
                    <input type="text" class="form-control font-weight-light" id="address" name="address" placeholder="1234 Main St">

                    <label class="my-2 font-weight-bold" for="address2">Address 2</label>
                    <input type="text" class="form-control font-weight-light" id="address2"  name="address2"placeholder="Apartment, studio, or floor">

                    <label class="my-2 font-weight-bold"for="telephone">Telephone</label>
                    <input type="text" class="form-control font-weight-light" id="telephone" name="telephone" placeholder="Telephone Number">

                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-2">

                    <label  class="font-weight-bold" for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city">

                  </div>
                  <div class="form-group col-md-2">

                    <label class="font-weight-bold" for="state">State</label>
                    <select id="inputState" class="form-control" name="state">
                      <option selected>Choose...</option>
                      <option>...</option>

                    </select>
                  </div>
                  <div class="form-group col-md-2">

                    <label class="font-weight-bold" for="zipcode">Zip</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode">

                    </div>
                  </div>

                </div>




              <div id="Tab2" class="tabcontent">
                <div class="form-row">
                  <div class="form-group">

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

               <div class="form-group col-md-3">
                 <button type="submit" class="btn btn-primary btn-sm" name="patient-submit">Add</button>
                 <button type="submit" class="btn btn-secondary btn-sm">Cancel</button>
               </div>

               </form>
             </div>

           </div>
           </div>



           <div class="card shadow mb-4 col-lg">
               <div class="card-header py-3">
             <h6 class="m-0 font-weight-bold text-primary">Patients</h6>

             </div>

           <div class="card-body">
           <div class = "form-group">
           <div class="card shadow mb-4">
           <div class="card-header py-3">
           <div class="card-body">
           <div class="form-group col-2 mx-auto my-auto d-block">
          <div class="file-field">
           <div class="mb-0 mx-5">
              <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
                class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
              </div>

              <div class="btn btn-mdb-color btn-rounded float-left">

                <span>Add photo</span>

                 <div class="custom-file">
                 <label class="btn btn-primary" for="fileToUpload">Take Picture</label>

                 <form action="upload.inc.php" method="post" enctype="multipart/form-data">

                 <input type="file"  class="form-control" name="fileToUpload" id="fileToUpload" accept="image/*;capture=camera" onchange="readURL(this);" />
                 <img id="blah" src="#" alt="your image">
                 <button type="submit" class="btn btn-primary btn-sm" name="treatment-submit">Submit</button>
                 </form>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>
                     </div>

            </div>
      </div>

</div>

</div>

';



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
