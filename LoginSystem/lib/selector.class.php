<?php


class Selector
{

  private $columnName;
  private $tableName;
  private $userId;

  public function __construct($columnName,$tableName,$userId)
  {
    $this->columnName = $columnName;
    $this->tableName = $tableName;
    $this->userId = $userId;
  }


  public function show()
  {
  require 'includes/dbh.inc.php';
  $sql = "SELECT" . $this->columnName . "FROM" . $this->tableName;
  $stmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($stmt,$sql))
      {
          header("Location: /appointments.php?error=sqlerror");
          exit();
      }
        /*else
        {
            $result = mysqli_query($conn, $sql);
          if(isset($_SESSION['userId']))
          {
              if(mysqli_num_rows($result) > 0)
              {
                  echo "<p>" .$this->tableName. " Name:</p>";
                  echo "<select name=  " .$this->tableName. "-name"">";
                  while ($row = mysqli_fetch_assoc($result))
                  {
                    echo "<option>" . $row[" ".$this->columnName." "] . "</option>";
                  }
              echo "</select>";
              }

        }


      }*/

    }
}

}
  ?>
