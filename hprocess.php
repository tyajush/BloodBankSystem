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
$db = "fcTstWRZwg";

  if(isset($_POST['login']))
  {     //checking if blanks are empty
      if( empty($_POST['id']) || empty($_POST['password']) )
      {
            header("location:hospital_login.php?Empty= You left some of the blanks empty, please try again");
      }
      else{
              $query="SELECT * FROM `".$db."`.`hreg` where hid = '".$_POST['id']."' and hpasssword = '".$_POST['password']."'";
              $result=mysqli_query($con,$query);
                if(mysqli_fetch_assoc($result))
                { $userType="hospital";
                  $_SESSION['huser']=$_POST['id'];
                  header("location:hwelcome.php");
                }
                else{
                  header("location:hospital_login.php?Invalid= Please Enter correct email and password");
                }

        }
    }

  else {
    echo 'not establish session';
  }



 ?>
