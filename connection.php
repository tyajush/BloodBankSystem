<?php
  //for local host
  //$con = mysqli_connect('localhost','root','');

  //for remote sql connection
  $con = mysqli_connect('remotemysql.com','4v8q1kWJBX','77E0A9PO5L');

  if(!$con)
  {
    die('Please check your connection '.mysqli_error());
  }

 ?>
