<?php

  $hostname = 'localhost';
  $username = 'root';
  $password = '';
  $db = 'customers';

  $mysqli = new mysqli($hostname, $username, $password,$db);

  if(!mysqli_connect_errno()) {
  //echo 'Connected to the database: '. $db;
  } else {
  //echo 'Can\'t connect to the database!';
    exit();
  }
?>
