<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'charpstar';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
$stmt = $con->prepare('SELECT url1, url2, url3 FROM accounts WHERE id = ?');
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($url1, $url2, $url3);
$stmt->fetch();
$stmt->close();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>CHARPSTAR</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2 align="center">Check your models here, <?=$_SESSION['name']?>!</h2>
			<table align="center">
			<tr>
    				<th>Article ID</th>
    				<th>Try Here</th>
    				<th>Current Status</th>
					<th>Comments</th>
  			</tr>
  			<tr align="center">
    			<td >1</td>
    			<td><a href="<?=$url1?>">Try here</a></td>
    			<td>
				    <select onchange="myFunction1()" align="center">
					<option>Yes</option>
					<option>No</option>
					</select>
				</td>
				<td><p id="Comments1" align="center" ></p></td>
  			</tr>
  			<tr align="center">
    			<td>2</td>
    			<td><a href="<?=$url2?>">Try here</a></td>
    			<td>
				    <select onchange="myFunction2()" align="center">
					<option>Yes</option>
					<option>No</option>
					</select>
				</td>
				<td><p id="Comments2" align="center"></p></td>
  			</tr>
			  <tr align="center">
    			<td>3</td>
    			<td><a href="<?=$url3?>">Try here</a></td>
    			<td>
				    <select onchange="myFunction3()" align="center">
					<option>Yes</option>
					<option>No</option>
					</select>
				</td>
				<td><p id="Comments3" align="center"></p></td>
  			</tr>
			</table>
		</div>
		<script>
function myFunction1() {
  let text;
  let option = prompt("Enter the Comments:", "");
  if (option == null || option == "") {
    text = "No Updated Comments";
  } else {
    text = option ;
  }
  document.getElementById("Comments1").innerHTML = text;
  
}
function myFunction2() {
  let text;
  let option = prompt("Enter the Comments:", "");
  if (option == null || option == "") {
    text = "No Updated Comments";
  } else {
    text = option ;
  }
  document.getElementById("Comments2").innerHTML = text;
  
}
function myFunction3() {
  let text;
  let option = prompt("Enter the Comments:", "");
  if (option == null || option == "") {
    text = "No Updated Comments";
  } else {
    text = option ;
  }
  document.getElementById("Comments3").innerHTML = text;
  
}
</script>
	</body>
</html>
