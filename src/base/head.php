<?php

$libdir="/var/www/src/";
//define('')应用配置文件路径
function __autoload($classname){
	global $libdir;
	$baseFile = $libdir . "base/" . $classname . ".php";
	$dbCtrlFile = $libdir . "dbctrl/" . $classname . ".php";
	$logFile = $libdir . "log/" . $classname . ".php";
	$loginFile = $libdir . "login/" . $classname . ".php";
	$redisFile = $libdir . "redis/" . $classname . ".php";
	if(file_exists($baseFile)){
		require $baseFile;
	}elseif(file_exists($dbCtrlFile)){
		require $dbCtrlFile;
	}elseif(file_exists($logFile)){
		require $logFile;
	}elseif(file_exists($loginFile)){
		require $loginFile;
	}elseif(file_exists($redisFile)){
		require $redisFile;
	}
}

function WX_LOG($file, $line, $level, $message){
	WXLog::Instance()->wLog($file, $line, $level, $message);
}

function RUN($OBJECT_TYPE){
	$evalStr = "\$app = new $OBJECT_TYPE();";
	eval($evalStr);
	$ret = $app->run();
	if($ret < 0){
		die();
	}elseif($ret == 0){
		$app->start();
	}else{
		return;
	}
}
?>
