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
      <div id="inner_full" >
            <div class="shadow p-3 mb-5 rounded" >
              <div class="header" onclick="location.href='index.html';">
                <h1 align="center"><b>Blood Bank Management System</b></h1>
              </div>
            </div>
                          <br><br>
        <div id="body">
            <div class="jumbotron">
              <p class="lead" align="center" > <b>Available blood in stock:- </b></p>
              <?php
                if(@$_GET['restrict']==true){
               ?>
               <div class="alert-light text-danger text-center">
                <?php echo $_GET['restrict'] ?>
               </div>
               <?php

                  }
                ?>
              <hr class="my-4">
                <table class="table table-striped">
                <tr>
                  <th>Sno.</th><th></th>
                  <th>Hospital Name</th><th></th>
                  <th>Hospital ID</th><th></th>
                  <th>Blood Type</th><th></th>
                  <th>Quantity (in ML)</th>
                </tr>

                <?php
                  $server = "localhost";
                  $username = "root";
                  $password = "";

                  $con = mysqli_connect($server,$username,$password);
                  if(!$con){
                    die("connection to database failed due to ".mysqli_connect_error());
                  }

                  $sql = "SELECT `sno`, `hospitalName`,`hospital ID`,`bloodType`, `quantity(ml)` from `bbs`.`bloodstock`";
                  $result = $con->query($sql);
                  if($result->num_rows > 0){
                      while($row = $result->fetch_assoc()){
                          echo "<tr><td>".$row["sno"]."</td><td></td><td>".$row["hospitalName"]."</td><td></td><td>".$row["hospital ID"]."</td><td></td><td>".$row["bloodType"]."</td><td></td><td>".$row[
                                "quantity(ml)"]."</td></tr>";
                      }
                      echo " </table>";
                  }
                  else{
                      echo "Table empty";
                  }

                  $con->close();

                 ?>

               </table>
               <br>
                  <div class="center">
                      <button type="submit" class="btn btn-primary btn-lg" name="submitAddBlood" onclick="location.href='request.php';">Request Blood</button>
                  </div>
              </div>

        </div>
      </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>
