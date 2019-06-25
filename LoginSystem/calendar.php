<?php
require "header.php";
require "classes/calendar.class.php";
 ?>

     <main>

       <?php
       if(isset($_SESSION['userId'])){

date_default_timezone_set("America/New_York");
            $transdate = date('m-d-Y', time());

                 $d = date_parse_from_format("m-d-Y",$transdate);

                $month = $d["month"];
                $year = $d["year"];

              $calendar = new Calendar($month,$year);
              $calendar->show();
            }else{
              echo '<p class=logout-status>You are logged out!!</p>';

            }
        ?>

     </main>

 <?php
 require "footer.php";
  ?>
