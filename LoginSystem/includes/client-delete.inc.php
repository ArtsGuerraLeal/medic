  <?php
session_start();

if(isset($_POST['client-delete'])){

require 'dbh.inc.php';

$clientID = $_POST['idClient'];
$userId = $_SESSION['userId'];

if( empty($clientID) ){
      header("Location: ../clients.php?error=emptyfields");
      exit();
}else{
      $sql = "SELECT idClient FROM clients WHERE idClient = ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../clients.php?error=sqlerror");
          exit();
      }else {
          mysqli_stmt_bind_param($stmt,"i", $clientID);
          mysqli_stmt_execute($stmt);
          mysqli_stmt_store_result($stmt);
          $resultCheck = mysqli_stmt_num_rows($stmt);
           if($resultCheck==0){
             header("Location: ../clients.php?error=nodata");
             exit();
           }else{
             $sql = "DELETE FROM clients WHERE idClient =".$clientID;
             $stmt = mysqli_stmt_init($conn);
             if(!mysqli_stmt_prepare($stmt,$sql)){
                 header("Location: ../clients.php?error=sqlerror");
                 exit();
             }else{
               mysqli_query($conn, $sql);
               header("Location: ../clients.php?clientdelete=success");
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
