<?php
session_start();
require_once("./nusoapClient.php");
//判断是否登录
require_once("./fun.php");
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	echo "<p><h1>Invalid!</h1></p>";
	echo "<p><a href='../index.html'>Click here to log in.</a></p>";
	exit();
}else{
	check_valid($_SESSION['username'],$_SESSION['password']);
}

//执行删除用户操作
$sid = $_GET['sid'];
$result = admin_delete_stu($username,$password,$sid);

if($result=='success'){
	echo "<script>window.location.href='./stu_list.php';</script>";
}else{
	echo "<script>alert('update error');window.history.go(-1);</script>";
}
