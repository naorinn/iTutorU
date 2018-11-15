<?php

class Model extends ModelCaller
{
	//database operations
	static $_connection;

	public function __construct() {
		$server = 'localhost';
		//$DBName = 'test';
		$DBName = 'itutorudb';
		$user = 'root';
		$pass = '';

		try {
			self::$_connection = new PDO("mysql:host=$server;dbname=$DBName;charset=utf8", $user, $pass);
			self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(Exception $ex) {
			header('location: /Default/404');
			//header('location: /app/views/Default/404.php');//, ['error' => 'Connection to database could not be established!']);
		}
		
	}


	public function lastInsertId(){
		return self::$_connection->lastInsertId();
	}

}

?>