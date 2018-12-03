<?php
class User extends Model 
{
	var $userId;
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

	public function getUserByUsername($username){
		$sql = "SELECT * FROM User WHERE username=:username";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['username'=>$username]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();

	}

	public function getUserById($userId){
		$sql = "SELECT * FROM User WHERE userId=:userId";
		$sql = "SELECT u.userId, p.firstName, p.lastName, p.profileImagePath FROM User u, Profile p
		WHERE u.userId = p.userId AND u.userId=:userId";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['userId'=>$userId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();

	}

	public function isTutor() {		
		$tutor = $this->model('Tutor');
		$current_tutor = $tutor->getTutorById($_SESSION['userId']);
		return $current_tutor != NULL;

	}

}


?>