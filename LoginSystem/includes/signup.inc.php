<?php

if(isset($_POST['signup-submit'])){

require 'dbh.inc.php';
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];
$companyName = $_POST['companyname'];
$companyId = $_POST['companyid'];


if(empty($firstname) ||empty($lastname) || empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
      header("Location: ../register.php?error=emptyfields&uid=".$username."&mail=".$email);
      exit();
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
      header("Location: ../register.php?error=invalidumailuid");
      exit();
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      header("Location: ../register.php?error=invalidmail&uid=".$username);
      exit();
}
elseif (!preg_match("/^[a-zA-Z0-9]*$/", $username) ) {
      header("Location: ../register.php?error=invaliduid&mail=".$email);
      exit();
}
elseif (!empty($companyName) && !empty($companyid)) {
      header("Location: ../register.php?error=companyboth");
      exit();
}else{
  //chech for multiple companies too
      $sql = "SELECT companyName FROM companies WHERE companyName = ?";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
          header("Location: ../register.php?error=sqlerror");
          exit();
      }
      if(!empty($companyName)) {
        $sql = "SELECT companyName FROM companies WHERE companyName = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s", $companyName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
         if($resultCheck > 0){
           header("Location: ../register.php?error=companyNameTaken");
           exit();
         }
         else{
           $sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
           $stmt = mysqli_stmt_init($conn);
           mysqli_stmt_prepare($stmt,$sql);
           mysqli_stmt_bind_param($stmt,"s", $username);
           mysqli_stmt_execute($stmt);
           mysqli_stmt_store_result($stmt);
           $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck>0){
              header("Location: ../register.php?error=usertaken&mail=".$email);
              exit();
            }
            else{
              $sql = "INSERT companies (companyName) VALUES(?)";
              $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt,$sql)){
                  header("Location: ../register.php?error=sqlerror");
                  exit();
              }else{
                mysqli_stmt_bind_param($stmt,"s",$companyName);
                mysqli_stmt_execute($stmt);

                $sql = "SELECT * FROM companies WHERE companyName = '".$companyName."'";
                $stmt = mysqli_stmt_init($conn);
              if(!mysqli_stmt_prepare($stmt,$sql))
                  {
                      header("Location: /login.php?error=sqlerror");
                      exit();
                  }
              else
              {
              $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_assoc($result);
                $tempId = $row["companyId"];
}

                $sql = "INSERT users (uidUsers,emailUsers,pwdUsers,companyId) VALUES(?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt,$sql)){

                    header("Location: ../register.php?error=sqlerror");
                    exit();
                }else{
                  mysqli_stmt_prepare($stmt,$sql);
                  $hashpwd = password_hash($password, PASSWORD_DEFAULT);
                  mysqli_stmt_bind_param($stmt,"sssi", $username,$email,$hashpwd,$tempId);
                  mysqli_stmt_execute($stmt);
                  header("Location: ../login.php?signup=success");
                  exit();
                }

              }

            }
         }

      }elseif(!empty($companyId)){

        $sql = "SELECT uidUsers FROM users WHERE uidUsers = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);
        mysqli_stmt_bind_param($stmt,"s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
         if($resultCheck>0){
           header("Location: ../register.php?error=usertaken&mail=".$email);
           exit();
         }else {

                           $sql = "SELECT * FROM companies WHERE companyId = " . $companyId;
                           $stmt = mysqli_stmt_init($conn);
                         if(!mysqli_stmt_prepare($stmt,$sql))
                             {
                                 header("Location: /login.php?error=sqlerror");
                                 exit();
                             }
                         else
                         {
                         $result = mysqli_query($conn, $sql);

                           $row = mysqli_fetch_assoc($result);
                           $tempId = $row["companyId"];
                          }

                           $sql = "INSERT users (uidUsers,emailUsers,pwdUsers,companyId) VALUES(?,?,?,?)";
                           $stmt = mysqli_stmt_init($conn);
                           if(!mysqli_stmt_prepare($stmt,$sql)){

                               header("Location: ../register.php?error=sqlerror");
                               exit();
                           }else{
                             mysqli_stmt_prepare($stmt,$sql);
                             $hashpwd = password_hash($password, PASSWORD_DEFAULT);
                             mysqli_stmt_bind_param($stmt,"sssi", $username,$email,$hashpwd,$tempId);
                             mysqli_stmt_execute($stmt);
                             header("Location: ../login.php?signup=success");
                             exit();
                           }
                         }
                        }


}
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else{
    header("Location: ../register.php");
    exit();
}
