<?php 

error_reporting(0);
include './mysqldb.class.php';

//db config
$dbConfig = array(	
				'hostname' => 'localhost',
				'username' => 'root',
				'password' => 'root',
				'database' => 'md5',
				'chartset' => 'utf8',
				'autoconnect' => 1,
				'pconnect'  => 0);
$con = new mysqldb();
$con->open($dbConfig);
$tables = $con->list_tables();
foreach ($tables as $key => $table) {
	$fds = $con->get_fields($table);
	foreach ($fds as $k => $fd) {
		//替换库中所有相关内容
		$sql = "update $table set $k=replace($k,'admin163.net','madman.in')";
		 
		$con->query($sql);
	}
 
}

 ?>
