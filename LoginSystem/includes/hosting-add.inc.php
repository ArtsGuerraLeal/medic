<?php
session_start();

if(isset($_POST['hosting-add'])){

require 'dbh.inc.php';
$clientName = $_POST['client-name'];
$hostingType = $_POST['hosting-type'];
$hostingCost = $_POST['hosting-cost'];
$hostingDomain = $_POST['hosting-domain'];
$hostingDateStart = $_POST['hosting-date-start'];
$hostingDateRenew = $_POST['hosting-date-renew'];
$userId = $_SESSION['userId'];

if( empty($hostingType) || empty($hostingCost)){
    header("Location: ../hosting.php?error=emptyfields&clientName=".$hostingType."&clientBusiness=".$hostingCost."clientName=".$hostingDateStart."&clientBusiness=".$hostingDateRenew);
    exit();
}
else{
    $sql = "SELECT idUsers FROM hosting WHERE idUsers = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        header("Location: ../hosting.php?error=sqlerror0");
        exit();
    }else {
           $sql = "SELECT idClient FROM clients WHERE nameClient = '$clientName' ";
           $stmt = mysqli_stmt_init($conn);
           if(!mysqli_stmt_prepare($stmt,$sql)){
               header("Location: ../hosting.php?error=sqlerror1");
               exit();
           }else {
                 $result = mysqli_query($conn, $sql);
                 $row = mysqli_fetch_assoc($result);

                 $sql = "INSERT hosting (idClient,idUsers,hostingType,hostingCost,domain,hostingDateStart,hostingDateRenew) VALUES(?,?,?,?,?,?,?)";
                 $stmt = mysqli_stmt_init($conn);
                       if(!mysqli_stmt_prepare($stmt,$sql)){
                           header("Location: ../hosting.php?error=sqlerror2");
                           exit();
                       }else{
                         mysqli_stmt_bind_param($stmt,"iisisss", $row["idClient"] ,$userId,$hostingType,$hostingCost,$hostingDomain,$hostingDateStart,$hostingDateRenew);
                         mysqli_stmt_execute($stmt);
                         header("Location: ../hosting.php?hostingadd=success");
                         exit();
                       }
         }
         }
    }
mysqli_stmt_close($stmt);
mysqli_close($conn);
}

else{
  header("Location: ../hosting.php");
  exit();
}
