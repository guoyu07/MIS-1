<?php
require_once('./lib/nusoap.php');

function get_stu_info_by_name($username,$password,$name){
	$client = new soapclient ("http://sdnuserver.sinaapp.com/nusoapServer.php?wsdl");
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('get_stu_info_by_name', array('username'=>"$username","password"=>"$password","name"=>"$name"));
	return $result;
}

function get_stu_info($username,$password,$sid){
	$client = new soapclient ("http://sdnuserver.sinaapp.com/nusoapServer.php?wsdl");
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('get_stu_info', array('username'=>"$username","password"=>"$password","sid"=>"$sid"));
	return $result;
}

function admin_judge($username,$password){
	$client = new soapclient ("http://sdnuserver.sinaapp.com/nusoapServer.php?wsdl");
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('admin_judge', array('username'=>"$username","password"=>"$password"));
	return $result;
}

function student_judge($sid,$password){
	$client = new soapclient ("http://sdnuserver.sinaapp.com/nusoapServer.php?wsdl");
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('student_judge', array('sid'=>"$sid","password"=>"$password"));
	return $result;
}

function student_get_my_info($sid,$password){
	$client = new soapclient ("http://sdnuserver.sinaapp.com/nusoapServer.php?wsdl");
	$client->soap_defencoding = 'UTF-8';
	$client->decode_utf8 = false;
	$client->xml_encoding = 'UTF-8';

	$result = $client->call('student_get_my_info', array('sid'=>"$sid","password"=>"$password"));
	return $result;
}
