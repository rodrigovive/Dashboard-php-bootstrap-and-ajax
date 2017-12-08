<?php namespace middlewareCheckLogin;
	include ( __DIR__.'/../controllers/LoginController.php');
	use LoginController  as Login;

	session_start();
	$username=$_POST['user'];
	$pass=$_POST['password'];
	$queryUser = mysqli_query($mysqli,"SELECT * FROM user WHERE email='$username'");
	
	echo Login\checkLogin::checkPass($queryUser,$pass,$mysqli);

?>

