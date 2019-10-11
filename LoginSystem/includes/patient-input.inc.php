  <?php
session_start();


if(isset($_POST['patient-cancel']))
{
  $userId = $_SESSION['userId'];
  $tmp_dir = "../uploads/tmp/";
  $tmpFileName = $userId. '.jpg';

  if (file_exists($tmp_dir.$tmpFileName)) {
    unlink($tmp_dir.$tmpFileName);
  //        echo "Sorry, file already exists.";
  }

}


if(isset($_POST['patient-submit']))
{

    require 'dbh.inc.php';

    $patientNumber = $_POST['patientnumber'];

    $firstName = $_POST['firstname'];
    $lastName= $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birthdate'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $civilStatus = $_POST['civilstatus'];
    $userId = $_SESSION['userId'];
    $companyId = $_SESSION['companyId'];
    $pic = $_FILES["fileToUpload"];
    $todays_date = date("Y-m-d");


    $target_dir = "../uploads/";
    $tmp_dir = "../uploads/tmp/";
    $tmpFileName = $userId.'_'.$companyId. '.jpg';
    $newFileName = $userId.'_'.$companyId. '.jpg';
    $uploadOk = 1;

if (file_exists($target_dir.$newFileName)) {
  unlink($target_dir.$newFileName);
}

if ($uploadOk == 1) {
  rename($tmp_dir.$tmpFileName, $target_dir.$newFileName);
}

if (file_exists($tmp_dir.$tmpFileName)) {
  unlink($tmp_dir.$tmpFileName);
}


          if(empty($firstName) || empty($lastName) || empty($birthDate) || empty($telephone) || empty($address))
          {
              header("Location: ../patients.php?error=emptyfields&firstName=".$firstName."&lastName=".$lastName."&birthDate=".$birthDate."&telephone=".$telephone."&address=".$address);
              exit();
          }elseif (!preg_match("/^[a-zA-Z]*$/", $firstName) ) {
                header("Location: ../patients.php?error=badFirstName&lastName=".$lastName."&birthDate=".$birthDate."&telephone=".$telephone."&address=".$address."&religion=".$religion);
                exit();
          }elseif (!preg_match("/^[a-zA-Z]*$/", $lastName) ) {
                header("Location: ../patients.php?error=badLastName&firstName=".$firstName."&birthDate=".$birthDate."&telephone=".$telephone."&address=".$address."&religion=".$religion);
                exit();
          }elseif ($birthDate > $todays_date || $birthDate < "1900-01-01") {
            header("Location: ../patients.php?error=badDate&firstName=".$firstName."&lastName=".$lastName."&telephone=".$telephone."&address=".$address);
                exit();
          }
              else
              {
                  $sql = "INSERT patients (firstName,lastName,gender,birthDate,telephone,address,religion,civilStatus,userId,companyId) VALUES(?,?,?,?,?,?,?,?,?,?)";
                  $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                      header("Location: ../patients.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                            if($gender=="Male")
                            {
                              $gender = 1;
                            }
                            else
                            {
                              $gender = 0;
                            }

                         mysqli_stmt_bind_param($stmt,"ssssssssii", $firstName,$lastName,$gender,$birthDate,$telephone,$address,$religion,$civilStatus,$userId,$companyId);
                         mysqli_stmt_execute($stmt);
                         header("Location: ../patients.php?clientadd=success");
                         exit();
                    }
              }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);
        }
          else{
            $userId = $_SESSION['userId'];
            $tmp_dir = "../uploads/tmp/";
            $tmpFileName = $userId. '.jpg';

            if (file_exists($tmp_dir.$tmpFileName)) {
              unlink($tmp_dir.$tmpFileName);
            //        echo "Sorry, file already exists.";
            }

              header("Location: ../patients.php");
              exit();
          }
