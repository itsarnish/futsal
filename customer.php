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
<h1>Customer Info
</h1>
<p><a href='adminPanel.php'>Back</a></p>

<ul>
		<li><a href="search/customersearch.php">Search</a></li>
	<li><a href="customerdl.php">VIEWs</a></li>
		<li><a href="logout.php"> LOG OUT</a></li>
</ul>
</body>
</html>