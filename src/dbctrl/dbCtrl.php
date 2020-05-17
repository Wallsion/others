<?php
require_once '/var/www/src/base/head.php';
class dbCtrl{

	private $dbHost = "";
	private $dbUser = "";
	private $dbPass = "";
	private $dbName = "";
	private $dbPort = "";
	private $dbFullHost = "";
	private $mysqliObj;

	public function __construct($dbUser, $dbPass, $dbName, $dbHost="localhost", $port = "3306"){
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;	
		$this->dbName = $dbName;
		$this->dbHost = $dbHost;
		$this->dbPort = $port;
		$this->dbFullHost = $this->dbHost . ":" . $this->dbPort;
		// 创建连接
		$this->mysqliObj = new mysqli($this->dbFullHost, $this->dbUser, $this->dbPass, $this->dbName);
		// 检测连接
		if ($this->mysqliObj->connect_error) {
			WX_LOG(__FILE__, __LINE__, 1, "Can not connect mysql!");
			die("连接失败: " . $this->mysqliObj->connect_error);
		} 
	}
	
	public function __destruct(){
		
	}

	private function query($sql){
		$result = $this->mysqliObj->query($sql);
		$arr = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				array_push($arr,$row);
			}
		} else{
			//do nothing;
		}
		$this->mysqliObj->close();
		return $arr;
	}
	
	private function multiExcute($sql){
		$result = null;
		if ($this->mysqliObj->multi_query($sql) === TRUE) {
			$result = true;
		} else {
			$result = false;
		}
		$this->mysqliObj->close();
		return $result;
	}
	
	private function excute($sql){
		$result = null;
		if ($this->mysqliObj->query($sql) === TRUE) {
			$result = true;
		} else {
			$result = false;
		}
		$this->mysqliObj->close();
		return $result;
	}
	
	public function seek($sql){
		$result = $this->query($sql);
		return $result;
	}
	
	public function insert($sql){
		$result = $this->excute($sql);
		return $result;
	}
	
	public function update($sql){
		$result = $this->excute($sql);
		return $result;
	}
	
	public function remove($sql){
		$result = $this->excute($sql);
		return $result;
	}
	
	public function multiInsert($sql){
		$result = $this->multiExcute($sql);
		return $result;
	}
}
?>
