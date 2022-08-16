<?php 
session_start();
include("db.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <div class="container">
      <form class="form" method="post">
  <div class="mb-3">
    <label class="form-label">Email address</label>
    <input type="email" class="form-control" name="loginemail" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" name="loginpsd">
  </div>
  <a href="index.php">Don't you have an account?</a><br>
  <button name="login" type="submit" class="btn btn-primary">login</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  if(isset($_POST["login"])&& isset($_POST["loginemail"]) &&isset($_POST["loginpsd"])){
    $email=$_POST["loginemail"];
    $pswd=$_POST["loginpsd"];
    if($email=="" || $pswd==""){
      echo "please fill all the areas";
    }else{
      $sql="SELECT * FROM users WHERE email='".$email."' AND password='".$pswd."' ";
      $result=mysqli_query($conn, $sql);
      if(mysqli_num_rows($result)>0){
        $_SESSION['user']=$email;
        header("Location: welcome.php");
        }else{
          echo "No data found";
        }
      }
    }
?> 