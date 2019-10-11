  <?php
session_start();

if(isset($_POST['patient-submit']))
{

    require 'dbh.inc.php';
    $firstName = $_POST['firstname'];
    $lastName= $_POST['lastname'];
    $gender = $_POST['gender'];
    $birthDate = $_POST['birthdate'];
    $telephone = $_POST['telephone'];
    $address = $_POST['address'];
    $religion = $_POST['religion'];
    $civilStatus = $_POST['civilstatus'];
    $userId = $_SESSION['userId'];

          if( empty($firstName) || empty($lastName) || empty($birthDate) || empty($telephone) || empty($address))
          {
              header("Location: ../patients.php?error=emptyfields&firsttName=".$firstName."&lastName=".$lastName."&birthDate=".$birthDate."&telephone=".$telephone."&address=".$address);
              exit();
          }
              else
              {
                  $sql = "INSERT patients (firstName,lastName,gender,birthDate,telephone,address,religion,civilStatus,userId) VALUES(?,?,?,?,?,?,?,?,?)";
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

                         mysqli_stmt_bind_param($stmt,"ssssssssi", $firstName,$lastName,$gender,$birthDate,$telephone,$address,$religion,$civilStatus,$userId);
                         mysqli_stmt_execute($stmt);
                         header("Location: ../patients.php?clientadd=success");
                         exit();
                    }
              }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);
        }
          else{
              header("Location: ../patients.php");
              exit();
          }
