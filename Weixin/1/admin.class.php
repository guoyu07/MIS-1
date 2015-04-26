<?php
require_once('nusoapClient.php');
class Admin{
	public $username = '';
	public $password = '';

	public function __construct($username,$password)
    {
        $this->username = $username;
        $this->password = md5("m".$password);
    }

    public function check(){
        $re = admin_judge($this->username,$this->password);
        return $re;
    }

    public function admin_get_stu_info_by_name($name){
    	$result = get_stu_info_by_name($this->username,$this->password,$name);
        $info = json_decode($result,true);
        $num = count($info);
        if($num==1){
            $content = "查询结果为空。";
        }elseif($num==2){
            $content = "查询结果出现重名情况，请使用学号进行查询\n请回复：\nAFS,管理员账号,密码,学生学号";
        }else{
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
        }
        return $content;
    }
    public function admin_get_stu_info($sid){
        $result = get_stu_info($this->username,$this->password,$sid);
        $info = json_decode($result,true);
        $num = count($info);
        if($num==1){
            $content = "查询结果为空。";
        }else{
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
        }
        return $content;
    }
}

