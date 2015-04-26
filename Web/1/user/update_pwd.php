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
//显示页面
$menu = "up_pwd";
require_once("./file/top.php");
?>
<!--中间内容部分开始-->
<div class="container" style="padding-top:50px;padding-left:100px;">
	<form class="form-horizontal" method="post" action="do_update_pwd.php">
	  
	  <div class="form-group">
	    <label for="newpwd" class="col-sm-2 control-label">新密码</label>
	    <div class="col-sm-10">
	      <input type="text" style="width:30%" class="form-control" name="newpwd">
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