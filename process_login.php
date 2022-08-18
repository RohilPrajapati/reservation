<?php
include('config.php');
session_start();
$email = $_POST["Email"];
echo $email;
$pass = $_POST["Password"];
echo $pass;
$qry=mysqli_query($con,"SELECT * from tbl_login where username='$email' and password='$pass'");
if(mysqli_num_rows($qry))
{
	$usr=mysqli_fetch_array($qry);
	if($usr['user_type']==2)
	{
		$_SESSION['user']=$usr['id'];
		if(isset($_SESSION['show']))
		{
			header('location:/booking.php');
		}
		else
		{
			header('location:/index.php');
		}
	}
	else
	{
		$_SESSION['error']="Login Failed!";
		header("location:login.php");
	}
	
}
else
{
	$_SESSION['error']="Login Failed!";
	header("location:login.php");
}
?>