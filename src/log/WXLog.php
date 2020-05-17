<?php

static $WXLogInstance = NULL;
define("WEB_SYSEM_COMM_CFG","/var/www/web-cfg/comm_cfg.ini");

class WXLog {
private $path;
private $switch;
private $level;

static function Instance(){
	global $WXLogInstance;
	if($WXLogInstance == null){
		$dispather = new WXLog();
		$WXLogInstance = $dispather;
	}
	return $WXLogInstance;
}

function __construct(){
	$commCfg = parse_ini_file(WEB_SYSEM_COMM_CFG,true);
	$commLogCfg = $commCfg['log'];
	$this->path = $commLogCfg['path'];
	$this->switch = $commLogCfg['switch'];
	$this->level = $commLogCfg['level'];
	$this->fileName = $commLogCfg['fileName'];
}
function __destruct(){
	
}

function wLog($file, $line, $level, $message){
	if($this->switch == 1){
		if($level >= $this->level){
			$logInfo = "[".date('Y-m-d H:i:s')."]";
			$logInfo = $logInfo . " \033[31mfile:" . $file . " at line " . $line  . " has a error:" . $message . "]\033[0m.\n";
			file_put_contents(($this->path).$this->fileName, $logInfo, FILE_APPEND);
		}else{
			//当前log等级小于预设等级，不写入
		}
	}else{
		//log关闭
	}

}
}
?>
