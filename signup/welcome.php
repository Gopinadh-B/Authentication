<?php 
session_start();
if(isset($_SESSION['user'])){
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
 echo "<h1>Welcome ".$_SESSION["user"]. "</h1>";
?>
<a href="?logout">Logout</a>
</body>
</html>
<?php 
if(isset($_GET["logout"])){
	session_destroy();
	header("Location: index.php");
}
}else{
	header("Location: index.php");
}
?>