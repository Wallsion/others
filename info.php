<?php
	define("SYSCONF_PATH",dirname(dirname(__FILE__))."/web-cfg/websyscfg.ini");
	$sysCfgInfo = parse_ini_file(SYSCONF_PATH,true);
	$dbCfg = $sysCfgInfo['dbInfo'];
	$dbhost = $dbCfg['dbHost'];
	$dbuser = $dbCfg['dbUser'];
	$dbpass = $dbCfg['dbPass'];
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
	while($row = mysqli_fetch_array($retval, MYSQLI_ASSOC))
	{	
		var_dump($row);
	}
?>
