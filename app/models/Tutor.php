<?php
class Tutor extends Model 
{
	var $userId;
	var $description;
	var $pay;
	var $rating;
	var $timesTutored;

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

	public function getUserByUsername($username){
		$sql = "SELECT * FROM User WHERE username=:username";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['username'=>$username]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();

	}

	public function getUserById($userId){
		$sql = "SELECT * FROM User WHERE userId=:userId";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['userId'=>$userId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();

	}

	public function getTutors($searchWord = ''){
		$sql = "SELECT * FROM Tutor t, Profile p WHERE t.userId=:p.userId AND t.description LIKE %:searchWord%";

        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['t.userId'=>$userId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();

	}

}


?>