<?php
require_once '/var/www/src/base/head.php';
define("USERCONF_PATH",dirname(dirname(__FILE__))."/web-cfg/usr_cfg.ini");
	
class ActionClass extends User{
	function __construct(){
		parent::__construct();
	}
	
	function __destruct(){
		
	}
	
	function start(){
		if(isset($_POST['w']) && !empty(trim($_POST['w']))){
			$func = trim($_POST['w']);
		} elseif(isset($_GET['w']) && !empty(trim($_GET['d']))){
			$func = trim($_GET['w']);
		}else{
			WX_LOG(__FILE__, __LINE__, 1, "我在START!");
			return -1;
	}
	}
}
RUN('ActionClass');	

/*
	$sysCfgInfo = parse_ini_file(USERCONF_PATH,true);
	$dbCfg = $sysCfgInfo['dbInfo'];
	$dbhost = $dbCfg['dbHost'];
	$dbuser = $dbCfg['dbUser'];
	$dbpass = $dbCfg['dbPass'];
	//var_dump(USERCONF_PATH);
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
		var_dump($conn);
    	die('连接失败: ' . mysqli_error($conn));
	}
	// 设置编码，防止中文乱码
	mysqli_query($conn , "set names utf8");
	$sql = 'SELECT * FROM UserInfo';
	mysqli_select_db( $conn, 'OldDays' );
	$retval = mysqli_query( $conn, $sql );
	$row = array();
	while($tem =  mysqli_fetch_array($retval, MYSQLI_ASSOC))
	{	
		//var_dump($row);
		array_push($row,$tem);
		if($tem == null){
			break;
		}
	}
	//var_dump($_POST['userID']);
	$row = $row[0];
	//var_dump($row['passWord']);
	if(($row['email']==$_POST['userID'] || $row['userID'] == $_POST['userID']) && $row['passWord'] == $_POST['password'])
	{
		echo json_encode(array("result"=>0, "info"=>array("message"=>"Yes you are logging in!")));
		WX_LOG(__FILE__, __LINE__, 1, "this is a test!");
	}
	else{
		echo json_encode(array("result"=>-1));
	}*/
?>
