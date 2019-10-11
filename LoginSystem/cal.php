<?php require "header.php";

?>

<?php

//show users of patient
//change to company and userId in future

if(isset($_SESSION['userId'])){



    echo '<div class="container-fluid">
    <h1 class="h3 mb-0 text-gray-800">Template Page</h1>
    <p class="mb-4">Text</p>';





    echo '<div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Title</h6>
      </div>
      <div class="card-body">';
      date_default_timezone_set("America/New_York");

         $transdate = date('m-d-Y', time());

              $d = date_parse_from_format("m-d-Y",$transdate);

             $month = $d["month"];
             $year = $d["year"];

           $calendar = new Calendar($month,$year);
           $calendar->show();
      echo '</div>
    </div>

  </div>';




}else {
  echo "Somethings wrong...";
}
?>



<?php require "footer.php";?>
