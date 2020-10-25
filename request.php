<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hospital Login</title>
    <link rel="stylesheet" href="css/s1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
  </head>
  <body>
      <div id="inner_full">

          <div class="shadow p-3 mb-5 rounded">
            <div class="header" onclick="location.href='index.html';">
              <h1 align="center"><b>Blood Bank Management System</b></h1>
            </div>
          </div>
          <?php
          //to ensure that user has loggedin as receiver
            session_start();
            if(isset($_SESSION['ruser'])){
              echo " <p><b> you are logged in as :-".$_SESSION['ruser']."</b><p>";
            }
            else{
                  if(isset($_SESSION['huser'])){
                    header("location:available.php?restrict= Hospitals are restricted to request blood");
                  }
                  else{
                  header("location:receiver_login.php");}
            }
           ?>

          <div id="body">
              <div class="jumbotron">
                <p class="lead" align="center" > <b>Enter details to request blood</b></p>
                <?php
                  if(@$_GET['Empty']==true){
                 ?>
                 <div class="alert-light text-danger text-center">
                  <?php echo $_GET['Empty'] ?>
                 </div>
                 <?php

                    }
                  ?>
                <hr class="my-4">
                  <form class="request" action="" method="post">
                    <input type="text" name="hospitalID" value="" placeholder="Hospital ID">
                    <input type="text" name="bloodType" value="" placeholder="Blood Type">
                    <input type="text" name="message" value="" placeholder="Enter your name/contact">
                    <div class="center">
                      <br>
                        <button type="submit" class="btn btn-primary btn-lg" name="requestBloodSubmit">submit</button>
                    </div>
                  </form>
                </div>

          </div>


      </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function successful(){
        alert("Request submitted successfully!");
      }
    </script>
  </body>
</html>

<?php

  // to insert request in request table
  if(isset($_POST['requestBloodSubmit']))
  {
    //Development on localhost connection
    // $server = "localhost";
    // $username = "root";
    // $password = "";
    // $db="bbs";

    //Remote Database connection
    $server = "remotemysql.com";
    $username = "4v8q1kWJBX";
    $password = "77E0A9PO5L";
    $db = "4v8q1kWJBX";


    $con = mysqli_connect($server,$username,$password);
    if(!$con){
      die("connection to database failed due to ".mysqli_connect_error());
    }

    $hospitalID = $_POST['hospitalID'];
    $bloodType = $_POST['bloodType'];
    $message = $_POST['message'];

    //checking all if blanks are Empty
    if( empty($_POST['hospitalID']) || empty($_POST['bloodType']) || empty($_POST['message']))
    {
          header("location:request.php?Empty= You left some of the blanks empty, please try again");
    }

    //query for inserting request to request table
    $sql = "INSERT INTO `".$db."`.`request` (`id`, `bloodType`, `recName`, `dt`)
            VALUES ('$hospitalID', '$bloodType', '$message', current_timestamp());";


    if($con->query($sql) == true){
      echo '<script type="text/javascript">',
       'successful();',
       '</script>';
    }
    else{
      echo "ERROR: $sql <br> $con->error";
    }

    $con->close();

  }

?>
