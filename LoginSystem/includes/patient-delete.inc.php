  <?php
session_start();

if(isset($_POST['patient-delete'])){

require 'dbh.inc.php';

$patientId = $_POST['patientid'];
$userId = $_SESSION['userId'];

if( empty($patientId) ){
      header("Location: ../patients.php?error=emptyfields");
      exit();
}else{
      $sql = "SELECT patientId FROM patients WHERE patientId = ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../clients.php?error=sqlerror");
          exit();
      }else {
          mysqli_stmt_bind_param($stmt,"i", $patientId);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
           if($resultCheck==0){
             header("Location: ../patients.php?error=nodata");
             exit();
           }else{
             $sql = "DELETE FROM patients WHERE patientId =".$patientId;
             $stmt = mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmt,$sql)){
                 header("Location: ../patients.php?error=sqlerror");
                 exit();
             }else{
               mysqli_query($conn, $sql);
               header("Location: ../patients.php?patientsdelete=success");
               exit();
             }
           }
      }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
    header("Location: ../clients.php");
    exit();
}
