<?php
	require_once("./nusoapClient.php");
	require_once("../config.php");
	function check_valid($username,$password){
		$url = "HTTP://".$_SERVER['SERVER_NAME']."/index.html";
		$result = admin_judge($username,$password);
		if($result=="invalid"){
			echo "<p><h1>Invalid!</h1></p>";
			echo "<p><a href='$url'>Click here to log in.</a></p>";
			exit();
		}
	}