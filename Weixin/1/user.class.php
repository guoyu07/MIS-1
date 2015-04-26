<?php
require_once('nusoapClient.php');
class User{
	public $sid = '';
	public $password = '';

	public function __construct($sid,$password)
    {
        $this->sid = $sid;
        $this->password = md5("m".$password);
    }
    public function check(){
    	$re = student_judge($this->sid,$this->password);
    	return $re;
    }
    public function get_my_info(){
        $result = student_get_my_info($this->sid,$this->password);
        $info = json_decode($result,true);
        $content = "";
        $content .= "姓名：".$info['name']."\n";
        $content .= "学号：".$info['sid']."\n";
        if($info['sex']==1){
            $content .= "性别：男\n";
        }elseif($info['sex']==0){
            $content .= "性别：女\n";
        }
        $content .= "身份证号：".$info['idnum']."\n";
        $content .= "电话：".$info['phone']."\n";
        $content .= "邮箱：".$info['email']."\n";
        $content .= "家庭住址：".$info['addr']."\n";
        return $content;
    }
}


