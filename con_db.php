<?php

//arxeio sto opoio ginetai

//i sindesi me tin vasi dedomenwn 

//stoixeia tis prosvasis
$servername = "localhost";

$username = "root";

$password = "";

$dbname = "covidtracker";

//sindesi
$conn = new mysqli($servername, $username, $password, $dbname);

//an yparxei provlima me tis sindesi
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>