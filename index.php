<?php
	
	$config = array(
		'DB_HOST' 		=> 'localhost',
		'DB_USER' 		=> 'root',
		'DB_PASS' 		=> 'A383359959a',
		'DB_NAME' 		=> 'waimai',
		'DB_PORT' 		=> 3306,
		'DB_CHARSET' 	=> 'utf8'
	);
	
	$mysqli = new MySQLi($config['DB_HOST'],$config['DB_USER'],$config['DB_PASS'],$config['DB_NAME'],$config['DB_PORT']);
	$mysqli->set_charset($config['DB_CHARSET']);
	
	$tables = getTable();
	
	function getTable(){
		global $mysqli;
		$arr = array();
		$query = $mysqli->query('show table status');
		while($row = $query->fetch_assoc()){
			$arr[] = $row;
		}
		return $arr;
	}
	
	function getField($name){
		global $mysqli;
		$arr = array();
		$query = $mysqli->query('SHOW FULL COLUMNS FROM '.$name);
		while($row = $query->fetch_assoc()){
			$arr[] = $row;
		}
		return $arr;
	}
	
	include(dirname(__FILE__).'/template/index.html');