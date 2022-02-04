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
  //database connection
     require_once "include/connet.php";

   $sql="SELECT * FROM customers ";
  $result=mysqli_query($conn,$sql);
$data=[];
	//fetch data from database
	while($d=mysqli_fetch_array($result,MYSQLI_ASSOC))//MYSQLI_BOTH(default),MYSQLI_NUM,MYSQLI_ASSOC
	{
		//insert $d into $data
		array_push($data, $d);
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title>VIEWs</title>
		<link rel="stylesheet" type="text/css" href="css/view.css">

</head>
<body>
<h1>Views</h1>
	<p><a href='customer.php'>Back</a></p>
<table border="1">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Email</th>
		</tr>
	</thead>
	<tbody>
		<?php 

foreach ($data as $a) {?>
<tr>
	<td><?php echo $a['customerId'] ?></td>
		<td><?php echo $a['customerName'] ?></td>
	<td><?php echo $a['address'] ?></td>
	<td><?php echo $a['phone'] ?></td>
		<td><?php echo $a['email'] ?></td>
		

		<td><a href="customerdelete.php?id=<?php echo $a['customerId'] ?>" onclick="return confirm('Are you sure to delete ?')">Delete</a></td>
	</tr>
<?php }?>


	</tbody>
</table>
</body>
</html>