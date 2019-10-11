  <?php
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
session_start();

if(isset($_POST['treatment-submit']))
{

    require 'dbh.inc.php';
    $patientId = $_POST['patientid'];
    $cost = $_POST['treatmentcost'];
    $date = $_POST['appointmentdate'];
    $time = $_POST['appointmenttime'];
    $discount = $_POST['treatmentdiscount'];
    $treatment1 = $_POST['treatment1'];
    $treatment2 = $_POST['treatment2'];
    $treatment3 = $_POST['treatment3'];
    $treatment4 = $_POST['treatment4'];
    $userId = $_SESSION['userId'];
    $companyId = $_SESSION['companyId'];

          if( empty($date) || empty($time) )
          {
              header("Location: ../appointments.php?error=emptyfields&clientName=".$date."&clientBusiness=".$time);
              exit();
          }
              else
              {
                  $sql = "INSERT appointments (patientId, treatment1Id, treatment2Id, treatment3Id, treatment4Id, appointmentDate, companyId, userId) VALUES(?,?,?,?,?,?,?,?)";
                  $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                      header("Location: ../appointments.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                            //$datetime = $date . " " . $time;
                            $datetime = date('Y-m-d h:m:s',strtotime($date.' '.$time));

                          //  $datetime = date_create_from_format( "j/n/Y G:i:s", $datetime );
                          //  $sqlDatetime = Date( "Y-m-j G:i:s", $datetime );



                         mysqli_stmt_bind_param($stmt,"isssssii",$patientId,$treatment1,$treatment2,$treatment3,$treatment4,$datetime,$companyId,$userId);
                         mysqli_stmt_execute($stmt);

                         header("Location: ../appointments.php?clientadd=success");

                         exit();
                    }
              }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);
        }
          else{
              header("Location: ../appointments.php");
              exit();
          }
