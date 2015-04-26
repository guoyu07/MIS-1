<?php
session_start();
require_once("./nusoapClient.php");
require_once("../config.php");
$url = $GLOBALS['URL'];
//判断是否登录
require_once("./fun.php");
if(!isset($_SESSION['sid']) || !isset($_SESSION['password'])){
	echo "<p><h1>Invalid!</h1></p>";
	echo "<p><a href='$url'>Click here to log in.</a></p>";
	exit();
}else{
	check_valid($_SESSION['sid'],$_SESSION['password']);
}
$info = my_info($_SESSION['sid'],$_SESSION['password']);
//显示页面
$menu = "stu_info";
require_once("./file/top.php");
?>
<!--中间内容部分-->
<div class="container" style="padding-top:50px;padding-left:100px;">
	<table class="table table-bordered">
		<tr>
			<td>姓名</td><td><?php echo $info['name'];?></td>
			<td rowspan="7" align="center">
				<?php if($info['pic']==''){?>
					<img src="../public/upload/default.png" width="400px"/>
				<?php
				}else{
					$pic = $info['pic'];
					echo '<img src="'.$info['pic'].'" width="400px"/>';
				}
				?>
			</td>
		</tr>
		<tr>
			<td>性别</td>
			<td>
				<?php
					if($info['sex']==1){
						echo "男";
					}else{
						echo "女";
					}
				?>
			</td>
		</tr>
		<tr><td>学号</td><td><?php echo $info['sid'];?></td></tr>
		<tr><td>身份证号</td><td><?php echo $info['idnum'];?></td></tr>
		<tr><td>电话</td><td><?php echo $info['phone'];?></td></tr>
		<tr><td>邮箱</td><td><?php echo $info['email'];?></td></tr>
		<tr><td>家庭住址</td><td><?php echo $info['addr']?></td></tr>
	</table>
</div>
<!--中间内容部分结束-->
<?php require_once('./file/footer.php');?>
</div><!--container end-->
</body>
</html>