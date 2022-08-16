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
    <input type="email" class="form-control" name="signupemail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label  class="form-label">Password</label>
    <input type="password" class="form-control" name="signuppsd">
  </div>
  <div class="mb-3">
    <label  class="form-label">Password Again</label>
    <input type="password" class="form-control" name="signuppsd2">
  </div>
  <a href="login.php">Are u already a member?</a><br>
  <button name="signup" type="submit" class="btn btn-primary">Signup</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  if(isset($_POST["signup"])&& isset($_POST["signupemail"]) &&isset($_POST["signuppsd"]) && isset($_POST["signuppsd2"])){
    $email=$_POST["signupemail"];
    $pswd=$_POST["signuppsd"];
    $pswd2=$_POST["signuppsd2"];
    if($email=="" || $pswd=="" ||$pswd2 ==""){
      echo "please fill all the areas";
    }else{
      if($pswd==$pswd2){
        $sql="INSERT INTO users (email,password) VALUES ('".$email."', '".$pswd."')";
          if(mysqli_query($conn, $sql)){
            $_SESSION["user"]=$email;
            header("Location: welcome.php");
          }else{
            echo "Error: " .$sql. "<br>". mysqli_error($conn);
          }

      }else{
        echo "passwords are not matching";
      }
      }
    }
?> 