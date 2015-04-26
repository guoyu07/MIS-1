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
$info = admin_info($_SESSION['username'],$_SESSION['password']);
//显示页面
$menu = "my_info";
require_once("./file/top.php");
?>
<!--中间内容部分-->
<div class="container" style="padding-top:50px;padding-left:100px;">
	<table class="table table-bordered">
		<tr>
			<td>用户名：</td>
			<td><?php echo $info['username'];?></td>
		</tr>
		<tr>
			<td>备注：</td>
			<td><?php echo $info['comment'];?></td></tr>
	</table>
</div>
<!--中间内容部分结束-->
<?php require_once('./file/footer.php');?>
</div><!--container end-->
</body>
</html>