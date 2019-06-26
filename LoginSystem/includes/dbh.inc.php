<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "Mapado99!";
$dbName = "medicsystem";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
  die("Connection Failed: ".mysqli_connect_error());
}
