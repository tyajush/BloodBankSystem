<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <script type="text/javascript">
        function emptyfields(){
          alert("YOU HAVE LEFT ALL THE BLANKS EMPTY");
        }
    </script>
  </body>
</html>

<?php
require_once('connection.php');
session_start();
//local machine 
//$db = "bbs";
//Remote sql connection
$db = "4v8q1kWJBX";

  if(isset($_POST['login']))
  {     //checking if blanks are empty
      if( empty($_POST['username']) || empty($_POST['password']))
      {
            header("location:receiver_login.php?Empty= You left some of the blanks empty, please try again");
      }
      else{

        //receiver login

              $query="SELECT * FROM `".$db."`.`rreg` where email = '".$_POST['username']."' and pass = '".$_POST['password']."'";
              $result=mysqli_query($con,$query);
                if(mysqli_fetch_assoc($result))
                {
                  $_SESSION['ruser']=$_POST['username'];
                  header("location:rwelcome.php");
                }
                else{
                  header("location:receiver_login.php?Invalid= Please Enter correct email and password");
                }

        }
    }

  else {
    echo 'not establish session';
  }



 ?>
