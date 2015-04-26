<?php
require_once('../config.php');
require_once('../lib/nusoap.php');

//重置管理员密码
function admin_update_pwd($username,$password,$npassword){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_update_pwd',array("username"=>"$username","password"=>"$password","npassword"=>"$npassword"));
	if (!$err = $client->getError()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}


//重置学生密码
function admin_update_stu_pwd($username,$password,$sid,$upassword){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_update_stu_pwd',array("username"=>"$username","password"=>"$password","sid"=>"$sid","upassword"=>"$upassword"));
	if (!$err = $client->getError()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}


//添加学生信息
function admin_add_stu($username,$password,$sid,$upassword,$name,$sex,$idnum,$email,$phone,$addr,$pic){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_add_stu',array("username"=>"$username","password"=>"$password","sid"=>"$sid","upassword"=>"$upassword","name"=>"$name","sex"=>"$sex","idnum"=>"$idnum","email"=>"$email","phone"=>"$phone","addr"=>"$addr","pic"=>"$pic"));
	if (!$err = $client->getError()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}


//删除学生信息
function admin_delete_stu($username,$password,$sid){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_delete_stu',array("username"=>"$username","password"=>"$password","sid"=>"$sid"));
	if (!$err = $client->getError()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

//更新学生信息
function admin_update_stu_info($username,$password,$sid,$name,$sex,$idnum,$email,$phone,$addr,$pic){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_update_stu_info',array("username"=>"$username","password"=>"$password","sid"=>"$sid","name"=>"$name","sex"=>"$sex","idnum"=>"$idnum","email"=>"$email","phone"=>"$phone","addr"=>"$addr","pic"=>"$pic"));
	if (!$err = $client->getError()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}


function get_stu_info($username,$password,$sid){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('get_stu_info', array('username'=>"$username","password"=>"$password","sid"=>"$sid"));
	if (!$err = $client->getError()) {
		$result = json_decode($result,true);
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function get_stu_list($username,$password,$type,$value){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('get_stu_list', array('username'=>"$username","password"=>"$password","type"=>"$type","value"=>"$value"));
	if (!$err = $client->getError()) {
		$result = json_decode($result,true);
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function admin_judge($username,$password){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_judge', array('username'=>"$username","password"=>"$password"));
	if (!$err = $client->getError()) {
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}

function admin_info($username,$password){
	$client = new soapclient ($GLOBALS['nusoapserver_url']);
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_info', array('username'=>"$username","password"=>"$password"));
	if (!$err = $client->getError()) {
		$result = json_decode($result,true);
		return $result;
	} else {
		echo "调用出错：", $err;
	}
}