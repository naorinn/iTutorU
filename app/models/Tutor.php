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
		$sql= "INSERT INTO Tutor (userId, description, pay) VALUES (:userId, :description, :pay)";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['userId'=>$this->userId, 'description'=>$this->description, 'pay'=>$this->pay]);			
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

	public function getTutors($subject = '', $program='', $price = 0, $price_upper = 0){
		$sql = "";
		if($program != '' || $price != ''){
			$sql = "SELECT t.userId, p.firstName, p.lastName, p.profileImagePath, t.pay, t.description, t.timesTutored, t.rating FROM Tutor t, Profile p WHERE t.userId=p.userId AND t.description LIKE :subject AND (p.programId = :program OR t.pay BETWEEN :price AND :price_upper)";
			$subject = "%$subject%";
			$stmt = self::$_connection->prepare($sql);
        	$stmt->execute(['subject'=>$subject, 'program'=>$program, 'price'=>$price, 'price_upper'=>$price_upper]);

		}
		else{			
			$sql = "SELECT t.userId, p.firstName, p.lastName, p.profileImagePath, t.pay, t.description, t.timesTutored, t.rating FROM Tutor t, Profile p WHERE t.userId=p.userId AND t.description LIKE :subject";
			$subject = "%$subject%";
			$stmt = self::$_connection->prepare($sql);
			$stmt->execute(['subject'=>$subject]);
		}
		

       // $stmt = self::$_connection->prepare($sql);
        //$stmt->execute(['subject'=>$subject, 'program'=>$program, 'price'=>$price]);
//$stmt->execute(['subject'=>$subject]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Tutor");
		return $stmt->fetchAll();

	}

}


?>