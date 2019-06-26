  <?php
session_start();

if(isset($_POST['client-submit'])){

require 'dbh.inc.php';

$clientName = $_POST['clientname'];
$clientBusiness = $_POST['clientbusiness'];
$userId = $_SESSION['userId'];

if( empty($clientName) || empty($clientBusiness) ){
      header("Location: ../patients.php?error=emptyfields&clientName=".$clientName."&clientBusiness=".$clientBusiness);
      exit();
}
elseif (!preg_match("/^[a-zA-Z0-9]*$/", $clientName) ) {
      header("Location: ../patients.php?error=invalidclientName&clientBusiness=".$clientBusiness);
      exit();
}elseif (!preg_match("/^[a-zA-Z0-9]*$/", $clientBusiness) ) {
      header("Location: ../patients.php?error=invalidclientBusiness&clientName=".$clientName);
      exit();
}else{
      $sql = "SELECT businessName FROM clients WHERE businessName = ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../patients.php?error=sqlerror");
          exit();
      }else {
          mysqli_stmt_bind_param($stmt,"s", $clientBusiness);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
           if($resultCheck>0){
             header("Location: ../patients.php?error=businessNametaken&clientName=".$clientName);
             exit();
           }else{
             $sql = "INSERT clients (nameClient,businessName,userId) VALUES(?,?,?)";
             $stmt = mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmt,$sql)){
                 header("Location: ../patients.php?error=sqlerror");
                 exit();
             }else{

               mysqli_stmt_bind_param($stmt,"sss", $clientName,$clientBusiness,$userId);
               mysqli_stmt_execute($stmt);
               header("Location: ../patients.php?clientadd=success");
               exit();
             }
           }
      }
}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
    header("Location: ../patients.php");
    exit();
}
