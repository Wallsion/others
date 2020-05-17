<?php
require_once "/var/www/src/base/head.php";

class redisCtrl{
	private $rdHsot = "localhost";
	private $rdPort = 6379;
	private $rdPass = "";
	private $rdNumber = 0;

	private $redis = null;
	public function __construct(){
		$this->redis = new Redis();
		//$this->redis->auth($this->rdPass);密码认证
		//$this->redis->select(1);选择数据库
	}
	
	public function __destruct(){

	}
	public function get($key){
		$this->redis->connect($this->rdHsot, $this->rdPort);
		$result = $this->redis->get($key); 
		return $result;
	}
	
}
?>
