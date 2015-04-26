<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>学生信息管理系统</title>
<link rel="stylesheet" type="text/css" href="../public/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../public/css/login.css"/>
<script src="../public/js/jquery.min.js"></script>
<script src="../public/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("li#<?php echo $menu;?>").addClass("active");
	});
</script>
</head>
<body>
	<div class="container">
	<div class="container-fluid banner">
	        <h2><strong>学生信息管理系统（管理后台）</strong></h2>
	</div>
	<div class="masthead">
		<ul class="nav nav-justified">
		  <li id="my_info"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/index.php">管理员信息</a></li>
		  <li id="stu_add"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/stu_add.php">新增学生信息</a></li>
		  <li id="stu_list"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/stu_list.php">查看学生信息</a></li>
		  <li id="up_pwd"><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/admin/updatepwd.php">修改密码</a></li>
		  <li><a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/user/logout.php">退出登录</a></li>
		</ul>
	</div>
