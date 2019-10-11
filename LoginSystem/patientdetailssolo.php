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

   <title>Clinimed</title>

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

    <body id="page-top">

      <!-- Page Wrapper -->
      <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav custom-color sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon ">

              <img class="rounded-circle logo-pic bg-light " src="img/clinimed.png" alt="">
            </div>
            <div class="sidebar-brand-text mx-3">Clinimed</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">

          <!-- Nav Item - Dashboard -->
          <li class="nav-item active">
            <a class="nav-link" >
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
          </li>

          <!-- Divider -->
          <hr class="sidebar-divider">

          <!-- Heading -->
          <div class="sidebar-heading">
            Patients
          </div>

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
              <i class="fas fa-fw fa-user-injured"></i>
              <span>Patients</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Patients</h6>
                <a class="collapse-item" href="patientssolo.php">Add Patient</a>
                <a class="collapse-item" href="patientslistsolo.php">Patient List</a>
              </div>
            </div>
          </li>

          <!-- Nav Item - Utilities Collapse Menu -->


          <!-- Divider -->



          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

          <!-- Main Content -->
          <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

              <!-- Sidebar Toggle (Topbar) -->
              <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
              </button>

              <!-- Topbar Search -->
              <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                  <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                      <i class="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
              </form>

              <!-- Topbar Navbar -->
              <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">
                  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                      <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                          <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </li>

                <!-- Nav Item - Alerts -->
                <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter">3+</span>
                  </a>
                  <!-- Dropdown - Alerts -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                      Alerts Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-primary">
                          <i class="fas fa-file-alt text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-success">
                          <i class="fas fa-donate text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="mr-3">
                        <div class="icon-circle bg-warning">
                          <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                      </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                  </div>
                </li>

                <!-- Nav Item - Messages -->
                <li class="nav-item dropdown no-arrow mx-1">
                  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i>
                    <!-- Counter - Messages -->
                    <span class="badge badge-danger badge-counter">7</span>
                  </a>
                  <!-- Dropdown - Messages -->
                  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                      Message Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                        <div class="status-indicator"></div>
                      </div>
                      <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                        <div class="status-indicator bg-warning"></div>
                      </div>
                      <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                      </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                      <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                        <div class="status-indicator bg-success"></div>
                      </div>
                      <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                      </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                  </div>
                </li>

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                  <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">Valerie Luna</span>
                    <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
                  </a>
                  <!-- Dropdown - User Information -->
                  <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                      Profile
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                      Settings
                    </a>
                    <a class="dropdown-item" href="#">
                      <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                      Activity Log
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                      Logout
                    </a>
                  </div>
                </li>

              </ul>

            </nav>


<?php

$patientId= $_POST['patientid'];
$userid = $_SESSION['userId'];
       //show users of patient
       //change to company and userId in future

       if(isset($_SESSION['userId'])){

         require 'includes/dbh.inc.php';

           $sql = "SELECT * FROM patients WHERE patientId = ".$patientId ;
           $stmt = mysqli_stmt_init($conn);
         if(!mysqli_stmt_prepare($stmt,$sql))
             {
                 header("Location: /patientslist.php?error=sqlerror");
                 exit();
             }
         else
         {
         $result = mysqli_query($conn, $sql);
         $row = mysqli_fetch_assoc($result);
          }


           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 mx-3 text-gray-800">'.$row["firstName"]." ".$row["lastName"] .'</h1><img id="picture" src="uploads/'.$row["patientId"].'.jpg" class="img-fluid rounded my-3" alt="your image">';

           echo
           //Input Form
           '<div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patients</h6>';


            echo '<div class="nav tab">
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab1'" .')" id="defaultOpen">Contact Info</button>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab2'" .')">Details</button>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab3'" .')">Picture</button>
              <button class="tablinks nav-item my-1 mx-1 btn btn-primary" onclick="openTab(event,'. "'Tab4'" .')">Other</button>


            </div>';

            echo '</div>

             <div class="card-body">
            <form action="includes/patient-update.inc.php" method="post">
             <div id="Tab1" class="tabcontent" >
               <div class="form-row">
                 <div class="form-group col-md-6">
                   <label class="my-2 font-weight-bold" for="firstname">Patient ID</label>
                   <input type="text" class="form-control font-weight-light" id="patientid" name="patientid" value="'.$row["patientId"].'">

                   <label class="my-2 font-weight-bold" for="firstname">Patient Number</label>
                   <input type="text" class="form-control font-weight-light" id="patientid" name="patientid" value="'.$row["patientId"].'">

                   <label class="my-2 font-weight-bold" for="firstname">First Name</label>
                   <input type="text" class="form-control font-weight-light" id="firstname" name="firstname" value="'.$row["firstName"].'">

                  <label class="my-2 font-weight-bold" for="lastname">Last Name</label>
                  <input type="text" class="form-control font-weight-light" id="lastname" name="lastname" value="'.$row["lastName"].'">

                  <label class="my-2 font-weight-bold" for="address">Address</label>
                  <input type="text" class="form-control font-weight-light" id="address" name="address" value="'.$row["address"].'">

                  <label class="my-2 font-weight-bold" for="address2">Address 2</label>
                  <input type="text" class="form-control font-weight-light" id="address2"  name="address2" placeholder="Apartment, studio, or floor"  value="'.$row["address2"].'">

                  <label class="my-2 font-weight-bold"for="telephone">Telephone</label>
                  <input type="text" class="form-control font-weight-light" id="telephone" name="telephone" placeholder="Telephone" value="'.$row["telephone"].'">
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

                  <option value="0">Todo México</option>


                   </select>
                 </div>
                 <div class="form-group col-md-2">

                   <label class="font-weight-bold" for="zipcode">Zip</label>
                   <input type="text" class="form-control" id="zipcode" name="zipcode" value="'.$row["zipcode"].'">

                 </div>
               </div>


             </div>

            <div id="Tab2" class="tabcontent">
              <div class="form-row">
                <div class="form-group col-md-2">

                  <label class="my-2 font-weight-bold" for="birthdate">Birthdate</label>
                  <input type="date" class="form-control" id="birthdate" name="birthdate" value="'.$row["birthDate"].'">

                  <label class="my-2 font-weight-bold" for="gender">Gender</label>
                  <select id="gender" class="form-control" name="gender">
                    <option selected>Male</option>
                    <option>Female</option>
                  </select>

                  <label class="my-2 font-weight-bold" for="religion">Religion</label>
                  <input type="text" class="form-control" id="religion" name="religion" placeholder="Religion" value="'.$row["religion"].'">

                    <label class="my-2 font-weight-bold" for="civilstatus">Civil Status</label>
                    <select id="civilstatus" class="form-control" name="civilstatus">
                      <option selected>Single</option>
                      <option>Married</option>
                    </select>

                </div>
               </div>
              </div>

             <div id="Tab3" class="tabcontent">
             <img id="picture" src="uploads/'.$row["patientId"].'.jpg" class="img-fluid rounded  mx-auto d-block" alt="your image">

             </div>

             <div id="Tab4" class="tabcontent">

             </div>

             <div class="form-group col-md-2">
               <button type="submit" class="btn btn-primary btn-sm" name="patient-update">Save</button>
               <button type="submit" class="btn btn-secondary btn-sm">Cancel</button>
             </div>

             </form>


           </div>
           </div>
           </div>';

           echo '<div class="container-fluid">
           <h1 class="h3 mb-0 mx-3 my-3 text-gray-800">'. $row["firstName"]." ".$row["lastName"]."'s Apointments".'</h1>

           <div class="card shadow mb-4">
             <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Patients</h6>
             </div>
             <div class="card-body">
               <div class="table-responsive">
                 <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                   <thead>
                     <tr>
                         <th>Appointment Number</th>
                         <th>Treatement</th>
                         <th>Cost</th>
                         <th>Date</th>
                         <th></th>
                         <th></th>
                     </tr>
                   </thead>
                   <tfoot>
                     <tr>
                     <th>Appointment Number</th>
                     <th>Treatement</th>
                     <th>Cost</th>
                     <th>Date</th>
                     <th></th>
                     <th></th>
                     </tr>
                   </tfoot><tbody>';

                   $sql = "SELECT * FROM appointments WHERE patientId = ".$patientId ;
                   $stmt = mysqli_stmt_init($conn);
                 if(!mysqli_stmt_prepare($stmt,$sql))
                     {
                         header("Location: /patientslist.php?error=sqlerror");
                         exit();
                     }
                 else
                 {
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);
                  }

                   if(mysqli_num_rows($result) > 0)
                   {
                     while ($row = mysqli_fetch_assoc($result))
                     {
                       echo
                       "<tr>
                       <td>".$row["patientId"]."</td>
                       <td>".$row["firstName"]. " ". $row["lastName"]."</td>
                       <td>";

                       if($row["gender"]==1)
                       {
                         echo "Male";
                       }
                       else
                       {
                         echo "Female";
                       }

                       echo "</td>
                       <td>".$row["birthDate"]."</td>
                       <td>".$row["telephone"]."</td>
                       <td>".$row["address"]."</td>
                       <td>".$row["religion"]."</td>
                       <td>".$row["civilStatus"]."</td>
                       <td>".

                       '<form class = "client-delete" action="includes/patient-delete.inc.php" method="post">
                       <button class = "btn btn-danger btn-sm" type="submit" name="patient-delete">Delete</button>
                       <input type="hidden" name="patientid" value="'.$row["patientId"].' ">
                       </form>'

                       .
                       "</td>
                       <td>"
                       .'<form class = "client-details" action="patientdetails.php" method="post">
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
