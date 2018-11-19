<?php
class Profile extends Model 
{
	var $userId;
	var $firstName;
	var $lastName;
	var $profileImagePath;
	var $schoolId;
	var $programId;

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql= "INSERT INTO Profile (userId, firstName, lastName, schoolId, programId) VALUES (:userId, :firstName, :lastName, :schoolId, :programId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$this->userId,'firstName'=>$this->firstName, 'lastName'=>$this->lastName, 'schoolId'=>$this->schoolId, 'programId'=>$this->programId]);					
	}

	public function update() {
		$sql = "UPDATE Profile SET firstName=:firstName, lastName=:lastName, schoolId=:schoolId, programId=:programId
				WHERE userId=:userId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$this->userId,'firstName'=>$this->firstName, 'lastName'=>$this->lastName, 'schoolId'=>$this->schoolId, 'programId'=>$this->programId]);
	}


	/*public function find($username) {
		$sql = "SELECT * FROM User WHERE username LIKE ':username'";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['username'=>$username]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, "User");
		return $stmt->fetch();
	}*/

	public function changeProfilePic($userId){
		$sql = "UPDATE Profile SET profileImagePath=:profileImagePath
				WHERE userId=:userId";

		$sth = self::$_connection->prepare($sql);
		$sth->execute(['userId'=>$userId, 'profileImagePath'=>$this->profileImagePath]);
	}

	public function getProfileByUserId($userId){
		$sql = "SELECT * FROM Profile WHERE userId = :userId";
        $stmt = self::$_connection->prepare($sql);
       $stmt->execute(['userId'=>$userId]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Profile");
		return $stmt->fetch();
	}



}


?>