<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/s1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">

    <title></title>
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
          <p class="lead" align="center"> <b>If you want to recieve blood then select Reciever LogIn <br> Else, select Hospital LogIn </b> </p>
          <?php
            if(@$_GET['Empty']==true){
           ?>
           <div class="alert-light text-danger text-center">
            <?php echo $_GET['Empty'] ?>
           </div>
           <?php
              }
            ?>
          <br><br>
        <div class="center">
            <button type="button" class="btn btn-outline-danger" onclick="location.href='receiver_login.php'">Reciever LogIn</button>
            <br>
            <button type="button" class="btn btn-danger" onclick="location.href='hospital_login.php'">Hospital LogIn</button>
          </div>


      </div>

    </div>


  </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>
