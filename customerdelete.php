<?php 
$er=[];
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
  //database connection
     require_once "include/connet.php";

  
			$id=$_GET['id'];
			$sql= "delete from customers where customerId=$id";
			mysqli_query($conn,$sql);
			header("location:customerdl.php");


?>

