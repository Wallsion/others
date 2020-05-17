<?php
	require_once '/var/www/src/base/head.php';
	//var_dump(__LINE__);
	/*define("SYSCONF_PATH",dirname(dirname(__FILE__))."/web-cfg/usr_cfg.ini");
	$sysCfgInfo = parse_ini_file(SYSCONF_PATH,true);
	$dbCfg = $sysCfgInfo['dbInfo'];
	$dbhost = $dbCfg['dbHost'];
	$dbuser = $dbCfg['dbUser'];
	$dbpass = $dbCfg['dbPass'];
	//phpinfo();
	//var_dump(SYSCONF_PATH);
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
	//$redis = new Redis();
	//$redis->connect('localhost', 6379);
	//$redis->set('test','hello test!');
?>
