<?php

$connect=mysqli_connect("localhost","root","","oddeven");
session_start();
if(isset($_POST['username'])&&isset($_POST['password']))
{
	$username=mysqli_real_escape_string($connect,$_POST['password']);
	$password=md5(mysqli_real_escape_string($connect,$_POST['password']));
	
	$result=mysqli_query($connect,"select RegNo from details where username='$username' and password='$password'");
	$count=mysqli_num_rows($result);
	$row=mysqli_fetch_array($result);
	
	if($count==1)
	{
		$_SESSION['login_user']=$row['RegNo'];
		echo $row['RegNo'];
	}
}

?>