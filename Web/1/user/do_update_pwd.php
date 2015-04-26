<?php
session_start();
require_once("./nusoapClient.php");
//判断是否登录
require_once("./fun.php");
if(!isset($_SESSION['sid']) || !isset($_SESSION['password'])){
	echo "<p><h1>Invalid!</h1></p>";
	echo "<p><a href='$url'>Click here to log in.</a></p>";
	exit();
}else{
	check_valid($_SESSION['sid'],$_SESSION['password']);
}
//执行更新用户信息操作
$sid = $_SESSION['sid'];
$password = md5('m'.$_POST['newpwd']);

$result = update_pwd($sid,$password);

if($result=='success'){
	echo "<script>alert('update password successfully');window.location.href='./logout.php';</script>";
}else{
	echo "<script>alert('old password id wrong.');window.history.go(-1);</script>";
}
