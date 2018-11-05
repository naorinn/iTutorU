<?php
class User extends Model 
{
	var $username;
	var $password;

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql= "INSERT INTO User (username, password) VALUES (:username, :password)";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['username'=>$this->username, 'password'=>$this->password]);			
	}

	public function find($username) {
		$sql = "SELECT * FROM User WHERE username LIKE ':username'";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['username'=>$username]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();
	}

	public function getUser($username){
		$sql = "SELECT * FROM User WHERE username=:username";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['username'=>$username]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();

	}

}


?>