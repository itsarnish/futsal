<?php 
session_start();
if(!isset($_SESSION['username']))
{
header('location:logout.php');
}
if($_SESSION['time'] < time())
{
	header('location:logout.php');
}
else{
	$_SESSION['time']=time()+600;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
<h1>Booking Info
</h1>
<p><a href='adminPanel.php'>Back</a></p>

<ul>
	<li><a href="dl.php">DELETE</a></li>
	<li><a href="ul.php">UPDATE</a></li>
	<li><a href="view.php">VIEWs</a></li>
		<li><a href="logout.php"> LOG OUT</a></li>
</ul>
</body>
</html>