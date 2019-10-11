  <?php
session_start();

if(isset($_POST['equipment-submit']))
{

    require 'dbh.inc.php';
    $equipmentName = $_POST['equipmentname'];
    $purchaseDate= $_POST['purchasedate'];
    $lastuseDate = $_POST['lastusedate'];
    $equipmentCost = $_POST['equipmentcost'];
    $userId = $_SESSION['userId'];
    $companyId = $_SESSION['companyId'];

          if( empty($equipmentName))
          {
              header("Location: ../equipment.php?error=emptyfields&equipmentname=".$equipmentName);
              exit();
          }
              else
              {
                  $sql = "INSERT equipment (equipmentName,purchaseDate,lastuseDate,equipmentCost,companyId) VALUES(?,?,?,?,?)";
                  $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql))
                    {
                      header("Location: ../equipment.php?error=sqlerror");
                        exit();
                    }
                    else
                    {
                         mysqli_stmt_bind_param($stmt,"sssii", $equipmentName,$purchaseDate,$lastuseDate,$equipmentCost,$companyId);
                         mysqli_stmt_execute($stmt);
                         header("Location: ../equipment.php?equipmentadd=success");
                         exit();
                    }
              }

          mysqli_stmt_close($stmt);
          mysqli_close($conn);
        }
          else{
              header("Location: ../equipment.php");
              exit();
          }
