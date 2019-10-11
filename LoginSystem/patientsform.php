<?php
session_start();
 ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>

   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="">
   <meta name="author" content="">

   <title>MediSystem</title>

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

   <!-- Custom fonts for this template-->
   <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">

   <link href="css/landing-page.min.css" rel="stylesheet">
   <link href="css/croppie.css" rel="stylesheet">

   <script src="js/tabbedForm.js">  </script>
   <script src="js/imagePreview.js"></script>


 </head>

  <body>

<body id="page-top" class = "bg-primary">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->


      <!-- Sidebar - Brand -->


      <!-- Divider -->

       <?php


       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

           echo '
            <div class="container-fluid">



          <div class="card shadow mb-4 my-4 ">
          <div class="card-header py-3">
      
         <div class="nav tab">
           <button class="tablinks nav-item my-3 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab1'" .')"  id="defaultOpen">Contact Info</button>
           <button class="tablinks nav-item my-3 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab2'" .')">Details</button>

           <button class="tablinks nav-item my-3 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab3'" .')">Picture</button>
           <button class="tablinks nav-item my-3 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab4'" .')">Other</button>
         </div>
         </div>

          <div class="card-body ">';



                echo '<form action="includes/patient-input.inc.php" method="post" enctype="multipart/form-data">
                  <div id="Tab1" class="tabcontent" >
                    <div class="form-row">
                      <div class="form-group col-md-6">';

                      if(isset($_GET['error'])){
                        if($_GET['error']=="emptyfields"){
                          echo '<h3 class = "text-danger text-center">Please fill all the fields</h3>';
                      }
                      if($_GET['error']=="badFirstName"){
                        echo '<h3 class = "text-danger text-center">Invalid First Name</h3>';
                    }
                    if($_GET['error']=="badLastName"){
                      echo '<h4 class = "text-danger text-center">Invalid Last Name</h4>';
                    }
                    if($_GET['error']=="badDate"){
                      echo '<h4 class = "text-danger text-center">Invalid Date</h4>';
                    }
                    }

                        echo '<label class="my-2 font-weight-bold" for="firstname">First Name*</label>
                        <input type="text" class="form-control font-weight-light" id="firstname" name="firstname" placeholder="First Name" value = "'.$_GET["firstName"].'">

                        <label class="my-2 font-weight-bold" id="lastnamelabel" for="lastname">Last Name*</label>
                        <input type="text" class="form-control font-weight-light" id="lastname" name="lastname" placeholder="Last Name" value = "'.$_GET["lastName"].'">

                        <label class="my-2 font-weight-bold"for="telephone">Telephone*</label>
                        <input type="text" class="form-control font-weight-light" id="telephone" name="telephone" placeholder="Telephone Number" value = "'.$_GET["telephone"].'">

                        <label class="my-2 font-weight-bold" for="address">Address*</label>
                        <input type="text" class="form-control font-weight-light" id="address" name="address" placeholder="1234 Main St" value = "'.$_GET["address"].'">

                        <label class="my-2 font-weight-bold" for="address2">Address 2</label>
                        <input type="text" class="form-control font-weight-light" id="address2"  name="address2" placeholder="Apartment, studio, or floor" value = "'.$_GET["address2"].'">


                      </div>
                    </div>';




                echo '  </div><div id="Tab2" class="tabcontent">
                    <div class="form-row">
                      <div class="form-group">

                        <label class="my-2 font-weight-bold" for="birthdate">Birthdate*</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value = "'.$_GET["birthDate"].'">

                        <label class="my-2 font-weight-bold" for="gender">Gender</label>
                        <select id="gender" class="form-control" name="gender">
                          <option selected>Male</option>
                          <option>Female</option>
                        </select>

                        <label class="my-2 font-weight-bold" for="religion">Religion</label>
                        <input type="text" class="form-control" id="religion" name="religion" placeholder = "Religion" value = "'.$_GET["religion"].'">

                          <label class="my-2 font-weight-bold" for="civilstatus">Civil Status</label>
                          <select id="civilstatus" class="form-control" name="civilstatus">
                            <option selected>Single</option>
                            <option>Married</option>
                          </select>

                      </div>
                     </div>
                     </div>



                   <div id="Tab3" class="tabcontent">

                   <div class="form-row">
                     <div class="form-group ">
                  <img id="picture" src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg" class="img-fluid rounded-circle avatar-pic mx-auto d-block" alt="your image">
                  <div id="uploaded_image"> </div>




 <div class="input-group mb-3">
   <div class="input-group-prepend">
     <span class="input-group-text">Upload</span>
   </div>
   <div class="custom-file">
   <input type="file" class = "custom-file-input" name="upload_image" id="upload_image" accept="image/*" onchange="readURL(this);"/>

     <label class="custom-file-label" for="upload_image">Take a picture</label>
   </div>
 </div>



                    </div>
                      </div>

                   </div>

                   <div id="Tab4" class="tabcontent">


                   <div class="form-group ">
                     <button type="submit" class="btn btn-primary btn-sm" name="patient-submit">Add</button>
                     <button type="submit" class="btn btn-secondary btn-sm" name="patient-cancel">Cancel</button>
                   </div>

                   </div>



                   </form>';









               echo '<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
    <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">Upload & Crop Image</h4>
         </div>
         <div class="modal-body">
           <div class="row">
        <div class="col-md-8 text-center">
         <div id="image_demo" style="width:350px; margin-top:30px"></div>
        </div>
        <div class="col-md-4" style="padding-top:30px;">
         <br />
         <br />
         <br/>
         <button class="btn btn-success crop_image">Crop & Upload Image</button>
      </div>
     </div>
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
         //              <input type="file" class="form-control " name="fileToUpload" id="fileToUpload" onchange="readURL(this);" />
         // <div class="form-row">
         //   <div class="form-group col-md-2">
         //
         //     <label  class="font-weight-bold" for="city">City</label>
         //     <input type="text" class="form-control" id="city" name="city">
         //
         //   </div>
         //   <div class="form-group col-md-2">
         //
         //     <label class="font-weight-bold" for="state">State</label>
         //     <select id="inputState" class="form-control" name="state">
         //       <option selected>Choose...</option>
         //       <option>...</option>
         //
         //     </select>
         //   </div>
         //   <div class="form-group col-md-2">
         //
         //     <label class="font-weight-bold" for="zipcode">Zip</label>
         //     <input type="text" class="form-control" id="zipcode" name="zipcode">
         //
         //     </div>
         //   </div>
         // </div>
       }
 ?>



 <script>
 document.getElementById("defaultOpen").click();
 </script>










</div>


<!-- Bootstrap core JavaScript-->


<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="vendor/exif-js/exif.js"></script>
<!-- Page level plugins -->


   <script src="js/croppie.js"> </script>
<script type="text/javascript">$(document).ready(function() {$('#dataTable').DataTable();});</script>

<script>
$(document).ready(function(){

 $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
      width:200,
      height:200,
      type:'square' //circle
    },
    boundary:{
      width:300,
      height:300
    }
  });

  $('#upload_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#uploadimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
      $.ajax({
        url:"../uploads/tmp/upload.php",
        type: "POST",
        data:{"image": response},
        success:function(data)
        {
          $('#uploadimageModal').modal('hide');
          $('#uploaded_image').html(data);
        }
      });
    })
  });

});
</script>

</body>

</html>
