<?php

//更改管理员密码
function admin_update_pwd($username,$password,$npassword){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//验证通过，执行更新信息操作
		$sql = "update `user` set `password`='$npassword' where `username`='$username'";
		$mysql->runSql($sql);
		return "success";
	}else{
		return "invalid";
	}
}

//管理员更新用户密码
function admin_update_stu_pwd($username,$password,$sid,$upassword){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//验证通过，执行更新信息操作
		$sql = "update `user` set `password`='$upassword' where `sid`='$sid'";
		$mysql->runSql($sql);
		return "success";
	}else{
		return "invalid";
	}
}

//管理员用户增加新的学生用户的
function admin_add_stu($username,$password,$sid,$upassword,$name,$sex,$idnum,$email,$phone,$addr,$pic){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//验证通过，执行更新信息操作
		if($pic==''){
		$sql = "insert into `user`(`sid`,`password`,`name`,`idnum`,`sex`,`email`,`phone`,`addr`) values('$sid','$upassword','$name','$idnum',$sex,'$email','$phone','$addr')";
		}else{
		$sql = "insert into `user`(`sid`,`password`,`name`,`idnum`,`sex`,`email`,`phone`,`addr`,`pic`) values('$sid','$upassword','$name','$idnum',$sex,'$email','$phone','$addr','$pic')";
		}
		$mysql->runSql($sql);
		return "success";
	}else{
		return "invalid";
	}
}

//管理员用户删除某个学生用户的信息
function admin_delete_stu($username,$password,$sid){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//验证通过，执行删除操作
		$sql = "delete from `user` where `sid`='$sid'";
		$mysql->runSql($sql);
		return "success";
	}else{
		return "invalid";
	}
}

//管理员用户修改某个学生用户的信息
function admin_update_stu_info($username,$password,$sid,$name,$sex,$idnum,$email,$phone,$addr,$pic){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//验证通过，执行更新信息操作
		if($pic==''){
		$sql = "update `user` set `name`='$name',`sex`=$sex,`idnum`='$idnum',`email`='$email',`phone`='$phone',`addr`='$addr' where `sid`='$sid'";
		}else{
		$sql = "update `user` set `name`='$name',`sex`=$sex,`idnum`='$idnum',`email`='$email',`phone`='$phone',`addr`='$addr',`pic`='$pic' where `sid`='$sid'";
		}
		$mysql->runSql($sql);
		return "success";
	}else{
		return "invalid";
	}
}

//管理员通过姓名获取学生信息

function get_stu_info_by_name($username,$password,$name){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//管理员用户验证通过
		$sql1 = "select count(*) as `num` from `user` where `name`='$name'";
		$arr = $mysql->getLine($sql1);
		$num = $arr['num'];
		$sql2 = "select * from `user` where `name`='$name'";
		if($num>1){
			$row = $mysql->getData($sql2);
		}else{
			$row = $mysql->getLine($sql2);
		}
		$result = json_encode($row);
		return $result;
	}else{
		return "invalid";
	}
}

//管理员用户获取某个学生用户的信息
function get_stu_info($username,$password,$sid){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//管理员用户验证通过
		$sql = "select * from `user` where `sid`='$sid'";
		$row = $mysql->getLine($sql);
		$result = json_encode($row);
		return $result;
	}else{
		return "invalid";
	}
}

//管理员用户获取所有学生用户的信息
function get_stu_list($username,$password,$type,$value){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		//管理员用户验证通过
		if($type==''||$value==''){
			$sql = "select * from `user` order by `sid` ";
		}else{
			$sql = "select * from `user` where `$type`='$value' order by `sid`";
		}
		$rows = $mysql->getData($sql);
		$result = json_encode($rows);
		return $result;
	}else{
		return "invalid";
	}
}

//管理员用户获取自己的信息
function admin_info($username,$password){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `admin` where `username`='$username'");
	if($row['password'] == $password){
		$result = json_encode($row);
		return $result;
	}else{
		return "invalid";
	}
}

//管理员用户登录判断
function admin_judge($username,$password){
	$mysql = new SaeMysql();
	$sql = "select `password` from `admin` where `username`='$username'";
	$row = $mysql->getLine($sql);
	if($row['password'] == $password){
		return "valid";
	}else{
		return "invalid";
	}
}

//学生用户登录判断
function student_judge($sid,$password){
	$mysql = new SaeMysql();
	$sql = "select `password` from `user` where `sid`='$sid'";
	$row = $mysql->getLine($sql);
	if($row['password'] == $password){
		return "valid";
	}else{
		return "invalid";
	}
}

//学生用户获取自己的信息
function student_get_my_info($sid,$password){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `user` where `sid`='$sid'");
	if($row['password'] == $password){
		$result = json_encode($row);
		return $result;
	}else{
		return "invalid";
	}
}

//学生用户更新自己的信息
function student_update_my_info($sid,$password,$name,$sex,$idnum,$email,$phone,$addr,$pic){
	$mysql = new SaeMysql();
	$row = $mysql->getLine("select * from `user` where `sid`='$sid'");
	if($row['password'] == $password){
		//验证通过，执行更新信息操作
		if($pic==''){
		$sql = "update `user` set `name`='$name',`sex`=$sex,`idnum`='$idnum',`email`='$email',`phone`='$phone',`addr`='$addr' where `sid`='$sid'";
		}else{
		$sql = "update `user` set `name`='$name',`sex`=$sex,`idnum`='$idnum',`email`='$email',`phone`='$phone',`addr`='$addr',`pic`='$pic' where `sid`='$sid'";
		}
		$mysql->runSql($sql);
		return "success";
	}else{
		return "invalid";
	}
}

//学生用户更新自己的密码
function student_update_my_pwd($sid,$password){
	$mysql = new SaeMysql();
	$sql = "update `user` set `password`='$password' where `sid`='$sid'";
	$mysql->runSql($sql);
	return 'success';
}