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

  <script src="js/tabbedForm.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
 <script src="vendor/datatables/jquery.dataTables.min.js"></script>
 <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <!-- Page level plugins -->


  <script type="text/javascript">$(document).ready(function() {$('#dataTable').DataTable();});</script>


</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>

              <form class="user" action="includes/signup.inc.php" method="post">

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" name="firstname" placeholder="First Name">
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" name="lastname" placeholder="Last Name">
                  </div>
                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" name="uid" placeholder="Username">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" name="mail" placeholder="Email Address">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" name="pwd" placeholder="Password">
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" name="pwd-repeat" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group text-center">
                  <p>Create or join an existing company</p>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <a class="tablinks nav-item my-1 mx-1 btn btn-primary text-light"  onclick= "openTab(event,'Tab1')">Create Company</a>
                  </div>
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <a class="tablinks nav-item my-1 mx-1 btn btn-primary text-light"  onclick= "openTab(event,'Tab2')">Join Company</a>
                  </div>
                </div>

                <div id="Tab1" class="tabcontent">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" name="companyname" placeholder="Company Name">
                    </div>
                  </div>

                      <button class="btn btn-primary btn-user btn-block" type="submit" name="signup-submit" onclick= "openTab(event,'Tab1')">Register</button>
                    </div>

                <div id="Tab2" class="tabcontent">
                  <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                      <input type="text" class="form-control form-control-user" name="companyid" placeholder="Company ID">
                    </div>
                  </div>
                      <button class="btn btn-primary btn-user btn-block" type="submit" name="signup-submit" onclick= "openTab(event,'Tab1')">Register</button>

                    </div>



              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
