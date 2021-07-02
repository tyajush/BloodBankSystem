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

        <div id="body">
            <div class="jumbotron">
              <p class="lead" align="center" > <b>Fill in the details to add blood to available blood samples</b></p>
              <hr class="my-4">
              <form class="addBlood" method="post" align="center">
                <input type="text" name="hospitalname" value="" placeholder="Hospital Name">
                <input type="text" name="hospitalID" value="" placeholder="Hospital ID">
                <input type="text" name="bloodtype" value="" placeholder="Blood Type eg. B+">
                <input type="int" name="quanity" value="" placeholder="Enter quanity in ml">
                <br><br>
                <button type="submit" class="btn btn-primary btn-lg" name="submitAddBlood">Add blood to stock</button>
              </form>


          </div>

        </div>


      </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript">
      function bloodAdded(){
        alert("Blood added to stock successfully!")
      }
    </script>
  </body>
</html>

<?php
if(isset($_POST['submitAddBlood']))
{
  //Development on localhost connection
  // $server = "localhost";
  // $username = "root";
  // $password = "";
  // $db="bbs";

  //Remote Database connection
  $server = "remotemysql.com";
  $username = "fcTstWRZwg";
  $password = "XZ3DRiQb3Z";
  $db = "fcTstWRZwg";

  $con = mysqli_connect($server,$username,$password);
  if(!$con){
    die("connection to database failed due to ".mysqli_connect_error());
  }

  $hospitalName = $_POST['hospitalname'];
  $hospitalID = $_POST['hospitalID'];
  $bloodType = $_POST['bloodtype'];
  $quantity = $_POST['quanity'];


  $sql = "INSERT INTO `".$db."`.`bloodstock` (`hospitalName`, `hospital ID`, `bloodType`, `quantity(ml)`)
          VALUES ('$hospitalName','$hospitalID', '$bloodType', '$quantity'); ";


  if($con->query($sql) == true){
    echo '<script type="text/javascript">',
     'bloodAdded();',
     '</script>';
  }
  else{
    echo "ERROR: $sql <br> $con->error";
  }

  $con->close();

}
 ?>
