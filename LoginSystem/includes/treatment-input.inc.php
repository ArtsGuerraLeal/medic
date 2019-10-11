<?php
session_start();

if(isset($_POST['treatment-submit']))
{

  require 'dbh.inc.php';
  $treatmentName = $_POST['treatmentname'];
  $treatmentCost= $_POST['treatmentcost'];
  $equipmentName = $_POST['equipmentname'];
  $userId = $_SESSION['userId'];
  $companyId = $_SESSION['companyId'];

        if( empty($treatmentName))
        {
            header("Location: ../treatments.php?error=emptyfields&treatmentname=".$treatmentName);
            exit();
        }
            else
            {
              $sql = "SELECT equipmentId FROM equipment WHERE companyId = '".$companyId."' AND equipmentName = '".$equipmentName."'";
              $stmt = mysqli_stmt_init($conn);

              if(!mysqli_stmt_prepare($stmt,$sql))
                  {
                      header("Location: /treatments.php?error=sqlerror");
                      exit();
                  }
              else
              {
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $equipmentId = $row["equipmentId"];
              }

                $sql = "INSERT treatments (treatmentName,treatmentCost,equipmentId,companyId) VALUES(?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt,$sql))
                  {
                    header("Location: ../treatments.php?error=sqlerror");
                      exit();
                  }
                  else
                  {
                       mysqli_stmt_bind_param($stmt,"siii", $treatmentName,$treatmentCost,$equipmentId,$companyId);
                       mysqli_stmt_execute($stmt);
                       header("Location: ../treatments.php?equipmentadd=success");
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
