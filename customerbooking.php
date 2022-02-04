<?php 
session_start();
$id=$_SESSION['customerId'];
$user=$_SESSION['user'];
$date=$_SESSION['dt'];
$time=$_SESSION['tm'];

if(!isset($_SESSION['user']))
{
header('location:customerlogout.php');
}
if($_SESSION['time'] < time())
{
  header('location:customerlogout.php');
}
else{
  $_SESSION['time']=time()+600;
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Booking Details</title>
</head>
<body>
<?php echo "Thank You ".$user."<br>Futsal charge per hour:Rs 1500<br>Date:".$date.'<br>Time:'.$time.'<br>You will be responce back after a hour.<br>please watch the status in booking.' ?>
<br>
<a href="customerpage.php">Home</a>
</body>
</html>