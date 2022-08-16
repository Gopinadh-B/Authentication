<?php 
  $servername="localhost";
  $username="root";
  $password="";
  $database="signup";
  //connecting the database and the web page.
  $conn=mysqli_connect($servername, $username, $password, $database);
  //Checking the connection.
  if(!$conn){
  die("connection failed: " . mysqli_connect_error());
  }
?>