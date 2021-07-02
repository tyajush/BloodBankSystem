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
              <p class="lead" align="center" > <b>Please enter details to register as Hospital.</b></p>
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

                  <form class="" method="post" align="center">
                    <input type="text" name="hospital_name" value="" placeholder="Hospital name">
                    <br><br>
                    <input type="text" name="address" value="" placeholder="Address">
                    <br><br>
                    <input type="number" name="id" value="" placeholder="Hospital ID">
                    <br><br>
                    <input type="password" name="hospitalpass" value="" placeholder="password">
                    <br><br>
                  <button type="submit" class="btn btn-primary" name="hospitalSubmit">Submit</button>
                  </form>



          </div>
        </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

    <script type="text/javascript">
      function duplicate(){
        alert("HOSPITAL ID NOT AVAILABLE, SELECT DIFFERENT HID");
      }
      function registered(){
        alert("Registraion successful!");
      }
    </script>

  </body>
</html>


<?php
if(isset($_POST['hospitalSubmit']))
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

  $hname = $_POST['hospital_name'];
  $address = $_POST['address'];
  $hid = $_POST['id'];
  $hpass = $_POST['hospitalpass'];

  //checking if blanks are Empty
  if( empty($_POST['hospital_name']) || empty($_POST['address']) || empty($_POST['id']) || empty($_POST['hospitalpass']) )
  {
        header("location:receiver_reg.php?Empty= You left some of the blanks empty, please try again");
  }

  //checking if Hospital ID is unique
  $query = "SELECT hid FROM `".$db."`.`hreg` WHERE hid = '$hid'";
  $fire = mysqli_query($con,$query);
  if(mysqli_num_rows($fire)>0){
    echo '<script type="text/javascript">',
     'duplicate();',
     '</script>';
  }


  $sql = "INSERT INTO `".$db."`.`hreg` (`hname`, `address`, `hid`, `dt`, `hpasssword`)
          VALUES ('$hname', '$address', '$hid', current_timestamp(), '$hpass');";


  if($con->query($sql) == true){
    echo '<script type="text/javascript">',
     'registered();',
     '</script>';
  }
  // else{
  //   echo "ERROR: $sql <br> $con->error";
  // }

  $con->close();

}
 ?>
