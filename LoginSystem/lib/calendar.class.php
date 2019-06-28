<?php

class Calendar
{
  private $month;
  private $year;
  private $days_of_the_week;
  private $num_days;
  private $date_info;
  private $day_of_the_week;

  public function __construct($month,$year,$days_of_the_week = array('S','M','T','W','T','F','S') ){
    $this->month = $month;
    $this->year = $year;
    $this->days_of_the_week = $days_of_the_week;
    $this->num_days = cal_days_in_month(CAL_GREGORIAN,$this->month, $this->year);
    $this->date_info = getdate(strtotime('First day of ', mktime(0,0,0,$this->month,1,$this->year)));
    $this->day_of_the_week = $this->date_info['wday'];

  }

  public function show(){
    $output  = '<table class = "calendar">';
    $output .= '<caption>' . $this->date_info['month'] . ' ' . $this->year . '</caption>';
    $output .= '<tr>';

    foreach ($this->days_of_the_week as $day) {
      $output .= '<th class = "header">' . $day . '</th>';
    }

    $output .= '</tr><tr>';


    if( $this->day_of_the_week > 0){
      $output .= '<td colspan=' . $this->day_of_the_week . '"></td>';
    }

    $current_day = 1;
    date_default_timezone_set("America/New_York");

    $today = date("Y-m-d");


    while ($current_day <= $this->num_days) {

      if($this->day_of_the_week == 7){
        $this->day_of_the_week = 0;
        $output .= '</tr><tr>';
      }


          require 'includes/dbh.inc.php';
            if(isset($_SESSION['userId'])){

             $userid = $_SESSION['userId'];
             $sql = "SELECT domain FROM hosting WHERE EXTRACT(DAY FROM hostingDateStart) = $current_day AND EXTRACT(MONTH FROM hostingDateStart) = $this->month AND EXTRACT(YEAR FROM hostingDateStart) = $this->year AND idUsers = ".$userid ;
             $sql2 = "SELECT domain FROM hosting WHERE EXTRACT(DAY FROM hostingDateRenew) = $current_day AND EXTRACT(MONTH FROM hostingDateRenew) = $this->month AND EXTRACT(YEAR FROM hostingDateRenew) = $this->year AND idUsers = ".$userid ;
             $stmt = mysqli_stmt_init($conn);
           if(!mysqli_stmt_prepare($stmt,$sql)){
               header("Location: /hosting.php?error=sqlerror");
               exit();
           }else {
             $result = mysqli_query($conn, $sql);
             $result2 = mysqli_query($conn, $sql2);

               if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0){
                  $output .= '<td class = "day">' . $current_day;

                  while ($rowX = mysqli_fetch_assoc($result)) {
                     $output .= "<br>"."Inicio: ".$rowX["domain"];
                  }


                 while ($rowY = mysqli_fetch_assoc($result2)) {
                    $output .= "<br>"."Expira: ".$rowY["domain"];
                 }



                $output .= '</td>';
               }else{
                $output .= '<td class = "day">' . $current_day.'</td>';
              }

              }
           }

      $current_day++;
      $this->day_of_the_week++;
    }

    if ($this->day_of_the_week != 7) {
      $remaining_days = 7 - $this->day_of_the_week;
      $output .= '<td colspan="' . $remaining_days . '"></td>';
    }

    $output .= '</tr>';
    $output .= '</table>';

    echo $output;

  }
}

 ?>
