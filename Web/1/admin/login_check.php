<?php
require_once("nusoapClient.php");
require_once("../config.php");
$url = $GLOBALS['URL'];
session_start();
$username = addslashes($_POST['name']);
$password = md5("m".$_POST['password']);
$result = admin_judge($username,$password);
if($result=="valid"){
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	echo "<script>window.location.href='./index.php';</script>";
}else{
	echo "<p>wrong username or password.</p><p><a href='$url'>Click here to log in.</a></p>";
}
?>
