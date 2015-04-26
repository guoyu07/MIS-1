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
$password = $_SESSION['password'];
$name = $_POST['name'];
$sex = $_POST['sex'];
$idnum = $_POST['idnum'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$addr = $_POST['addr'];

//原文件名
$file_name = $_FILES['pic']['name'];
if($file_name){
	//服务器上临时文件名
	$tmp_name = $_FILES['pic']['tmp_name'];
	//获得文件扩展名
	$temp_arr = explode(".", $file_name);
	$file_ext = array_pop($temp_arr);
	$file_ext = trim($file_ext);
	$file_ext = strtolower($file_ext);
	//新文件名
	$new_file_name = date("YmdHis").'_'.rand(10000, 99999).'.'.$file_ext;
	$s = new SaeStorage();
	$s->upload('qianshou', $new_file_name, $tmp_name);
	$pic = $s->getUrl('qianshou',$new_file_name);
}

$result = update_info($sid,$password,$name,$sex,$idnum,$email,$phone,$addr,$pic);

if($result=='success'){
	echo "<script>window.location.href='./index.php';</script>";
}else{
	echo "<script>alert('update error');window.history.go(-1);</script>";
}
