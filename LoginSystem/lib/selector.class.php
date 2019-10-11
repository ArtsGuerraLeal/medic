<?php


class Selector
{

  private $columnName;
  private $tableName;
  private $companyId;

  public function __construct($columnName,$tableName,$companyId,$selectorName)
  {
    $this->columnName = $columnName;
    $this->tableName = $tableName;
    $this->companyId = $companyId;
    $this->selectorName = $selectorName;
  }


  public function Show()
  {
      require 'includes/dbh.inc.php';
        $sql = "SELECT " . $this->columnName . " FROM ". $this->tableName . " WHERE companyId = " . $this->companyId ;
        //die($sql);
        $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt,$sql))
      {
          header("Location: /dashboard.php?error=sqlerror");
          exit();
      }
      else{
        $result = mysqli_query($conn, $sql);

          if(mysqli_num_rows($result) > 0)
          {

              echo "<select class="."form-control"." name=".$this->selectorName.">";
              echo "<option>None</option>";
              while ($row = mysqli_fetch_assoc($result))
              {

                echo "<option>" . $row["$this->columnName"] . "</option>";
              }
          echo "</select>";
          }

          else{
            echo "No ".$this->tableName." avaliable";
          }
        }
      }
    }



  ?>
