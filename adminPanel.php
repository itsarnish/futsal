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
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
</head>
<body>
<h1>Welcome To Admin Panel <br><?php echo $_SESSION['username']; ?>
</h1>
<ul>
	<li><a href="booking.php">Booking</a></li>
	<li><a href="customer.php">Customer</a></li>
		<li><a href="logout.php"> LOG OUT</a></li>
</ul>
</body>
</html>