<?php 
$id=$_SESSION['customerId'];
$user=$_SESSION['user'];

  //database connection
     require_once "include/connet.php";

  $sql="SELECT * FROM bookings where customerId=$id
  ";
 //1st option $result = $conn->query($sql);
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

</head>
<body>

<table border="1">
	<thead>
		<tr>
			<th>User_id</th>
			<th>Date</th>
			<th>Time</th>
			<th>Status</th>
			<th>Amount</th>
		</tr>
	</thead>
	<tbody>
		<?php 
	

foreach ($data as $a) {?>
<tr>
	
		<td><?php echo $user ?></td>
		<td><?php echo $a['bookingDate'] ?></td>
		<td><?php echo $a['bookingTime'] ?></td>
<td><?php if($a['status']==1){
			echo "confirm";
		}
		else{
			echo "pending";
		} ?></td>						<td><?php echo $a['price'] ?></td>

		
	</tr>
<?php }?>


	</tbody>
</table>
</body>
</html>