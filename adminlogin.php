<?php 
  
if(isset($_POST['submit']))
{
  $err=[];
  if(isset($_POST['username'])&& !empty($_POST['username']) && trim($_POST['username']) != '')
  {
    if(strlen($_POST['username'])<6)
    {
      $err['username']="username must be 6 characters";
    }
    else
    {
          $username = $_POST['username'];
    }
  }
  else
  {
    $err['username']="Enter Username";
  }
  if(isset($_POST['password'])&& !empty($_POST['password']) && trim($_POST['password']) != '')
  {
    
    $password = md5($_POST['password']);
  }
  else
  {
    $err['password']="Enter password";
  }

//database
if(count($err)==0)
{

   require_once "include/connet.php";

   $sql="select * from administrators where astatus='1' and adminName='$username' and adminPassword='$password'";
  //execute
$result=mysqli_query($conn,$sql);
$data=[];
$bid=0;

while($d=mysqli_fetch_array($result))
{
array_push($data, $d);
}
foreach($data as $a)
{
  $bid=$a['adminId'];
}
if(mysqli_num_rows($result)==1)
{
session_start();
$_SESSION['username']=$username;
$_SESSION['adminId']=$bid;
$_SESSION['time']=time() + 600;
if (isset($_POST['rem'])&& !empty($_POST['rem'])) {
      setcookie('username',$username,time()+60); 
      }

      header('location:adminPanel.php');

} else{
  echo '<h4 style="color:white;">login failed<h4>';
}
}
//database ends
if(isset($_COOKIE['username'])&&!empty($_COOKIE['username']))

{
  session_start();
        $_SESSION['username']=$_COOKIE['username'];
  $_SESSION['time']=time()+600;
header('location:adminPanel.php');
}
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/adminlogin.css" >
	<script type="text/javascript">
		function valid()
		{
			var a=document.form.username.value;
			var b=document.form.password.value;
		if(a!=' ')
    {
if(a<6)
{
alert("username must be 6 characters");
}
    }
    else
    {
      alert("Enter username");
    }
    if(b=='')
    {
alert("Enter password");
    }
		}
	</script>
</head>
<body>
<div class="loginBox">
			<a href='homePage.php'><img src="img/futsalogo.png" class="user"></a>
			<h2>Log In</h2>
			<form method="post" action="" name='form'>
				<p>Username</p>
				<input type="text" name="username" placeholder="">
				<section><?php if(isset($err['username']))
  {
    echo $err['username'];
  }
  ?></section>
				<p>Password</p>
				<input type="password" name="password" placeholder="">

				<section><?php 
  if(isset($err['password']))
  {
    echo $err['password'];
  }
  ?></section>
<span>Remember me</span>
  <input type="checkbox" name="rem"><br>
				<input type="submit" name="submit" value="Sign In">
			</form>
		</div>

</body>
</html>
