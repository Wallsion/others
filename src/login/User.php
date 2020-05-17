<?php

require_once '/var/www/src/base/head.php';
define('COMMONRCONF_PATH',"/var/www/web-cfg/comm_cfg.ini");
abstract class User{
	private $email="";
	private $phone="";
	private $userID="";
	private $passWord="";
	private $db = null;
	private $redis = null;
	private $funcArr = null;
/*private
private
private
*/
public function __construct(){
	$this->funcArr = array("getUserID","getEmail","getUserInfo","checkLogin","isLock","isDelete","register","login","logout","lockUser","deleteUser","userAuthority");
	$commCfgInfo = parse_ini_file(COMMONRCONF_PATH,true);
	$this->db = new dbCtrl($commCfgInfo['loginDatabase']['dbUser'], $commCfgInfo['loginDatabase']['dbPass'], $commCfgInfo['loginDatabase']['dbName']);
	$this->redis = new redisCtrl();
}
public function __destruct(){

}

public function run(){
//判断get/post内容，如果属于user可以处理的范围内，直接完成不走start
//如果不是user处理的内容走start，让子类去处理。
//
	$func = null;
	if(isset($_POST['w']) && !empty(trim($_POST['w']))){
		$func = trim($_POST['w']);
	} elseif(isset($_GET['d']) && !empty(trim($_GET['d']))){
		$func = trim($_GET['d']);
	}else{
		WX_LOG(__FILE__, __LINE__, 1, "我在这!");
		return -1;
	}
	if(in_array($func, $this->funcArr)){
		if($func == "login" || $func == "register" || $func == "checkLogin")
		{
			$this->$func();
		}else{
			if(!$this->checkLogin()){
				WX_LOG(__FILE__, __LINE__, 1, "Don not login or have long time to update login state!");
				return 101;
				//提示登录
			}else{
				$this->$func();
			}
		}
	}else{
		if(!$this->checkLogin()){
			WX_LOG(__FILE__, __LINE__, 1, "Don not login or have long time to update login state!");
			return 101;
			//提示登录
		}else{
			return 0;
		}
	}
	return 100;
}

abstract public function start();

public function getUserID(){

}

public function getEmail(){

}

public function getUserInfo(){

}

public function checkLogin(){
	if($this->redis->get('WX')){
		echo json_encode(array("result"=>0, "info"=>array("message"=>"Yes you are logging in!")));
	}
	else{
		echo json_encode(array("result"=>-1, "info"=>array("message"=>"No, you are`t login!")));
	}
}

private function isLock(){

}

private function isDelete(){

}

private function register(){
	$nickName = $_POST['nickName'];
	$passWord = $_POST['passWord'];
	$email = $_POST['email'];
	echo $nickName . $passWord . $email;
}

private function login(){


}

private function logout(){

}

private function lockUser(){

}

private function deleteUser(){

}

private function userAuthority(){
	
}

public function get(){
	return array('email'=>$this->email,'phoneNum'=>$this->phone,'userID'=>$this->userID,'passWord'=>$this->passWord);
}
public function set($arr){
	if(array_key_exists('email',$arr)){
		
	}elseif(array_key_exists('phoneNum',$arr)){
		
	}elseif(array_key_exists('userID',$arr)){
		
	}elseif(array_key_exists('passWord',$arr)){
		
	}else{
		
	}
}
}
?>
