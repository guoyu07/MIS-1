<?php
session_start();
require_once("./nusoapClient.php");
require_once("../config.php");
$url = $GLOBALS['URL'];
//判断是否登录
require_once("./fun.php");
if(!isset($_SESSION['username']) || !isset($_SESSION['password'])){
	echo "<p><h1>Invalid!</h1></p>";
	echo "<p><a href='$url'>Click here to log in.</a></p>";
	exit();
}else{
	check_valid($_SESSION['username'],$_SESSION['password']);
}
$sid = intval($_GET['sid']);
//显示页面
$menu = "up_pwd";
require_once("./file/top.php");
?>
<!--中间内容部分-->

<div class="container" style="padding-top:50px;padding-left:100px;">
	<form class="form-horizontal" enctype="multipart/form-data" method="post" action="updatepwd_do.php">
		
	  <div class="form-group">
	    <label for="password" class="col-sm-2 control-label">新密码</label>
	    <div class="col-sm-10">
	      <input type="password" style="width:30%" class="form-control" name="password">
	    </div>
	  </div>

	  <div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-primary">确　认</button>
	    </div>
	  </div>

	</form>
</div>
<!--中间内容部分结束-->
<?php require_once('./file/footer.php');?>
</div><!--container end-->
</body>
</html>