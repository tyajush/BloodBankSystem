<?php
  //for local host
  //$con = mysqli_connect('localhost','root','');

  //for remote sql connection
  $con = mysqli_connect('remotemysql.com','fcTstWRZwg','XZ3DRiQb3Z');

  if(!$con)
  {
    die('Please check your connection '.mysqli_error());
  }

 ?>
