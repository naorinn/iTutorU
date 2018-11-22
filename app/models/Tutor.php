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


	public function getTutorById($userId){
		$sql = "SELECT t.userId, p.firstName, p.lastName, p.profileImagePath FROM Tutor t, Profile p
		WHERE t.userId = p.userId AND t.userId=:userId";
        $stmt = self::$_connection->prepare($sql);
        $stmt->execute(['userId'=>$userId]);

        $stmt->setFetchMode(PDO::FETCH_CLASS, "Tutor");
		return $stmt->fetch();

	}

	public function getTutors($subject){
		
		$sql = "SELECT t.userId, p.firstName, p.lastName, p.profileImagePath, t.pay, t.description, t.timesTutored, t.rating FROM Tutor t, Profile p WHERE t.userId=p.userId AND t.description LIKE :subject";
		$subject = "%$subject%";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['subject'=>$subject]);
	
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Tutor");
		return $stmt->fetchAll();

	}

	public function getTutorsAdvancedSearch($subject = '', $programId='', $price_lower = 0, $price_upper = 0){
		$subjectSql = "";
		$programSql = "";
		$priceSql = "";

		$array = [];

		if($subject != ''){
			$subjectSql = " AND t.description LIKE :subject";
			$subject = "%$subject%";
			$array['subject'] = $subject;
//			array_push($array, "subject", $subject);
		}

		if($programId != '') {
			$programSql = " AND p.programId = :programId";
			array_push($array, "programId", $programId);
		}

		if($price_lower != 0 && $price_upper != 0){
			$priceSql = " AND t.pay BETWEEN :price_lower AND :price_upper";
			array_push($array, "price_lower", $price_lower);
			array_push($array, "price_upper", $price_upper);
		}

//		$whereClause = implode(" AND ", $array);

		/*$sql = "SELECT t.userId, p.firstName, p.lastName, p.profileImagePath, t.pay, t.description, t.timesTutored, t.rating FROM Tutor t, Profile p 
				WHERE t.userId=p.userId AND t.description LIKE :subject AND (p.programId = :programId OR t.pay BETWEEN :price_lower AND :price_upper)";*/


//				WHERE t.userId=p.userId AND t.description LIKE :subject AND (p.programId = :programId OR t.pay BETWEEN :price_lower AND :price_upper)";*/
		


		$sql = "SELECT t.userId, p.firstName, p.lastName, p.profileImagePath, t.pay, t.description, t.timesTutored, t.rating FROM Tutor t, Profile p 
				WHERE t.userId=p.userId".$subjectSql.$programSql.$priceSql;

		echo $sql;
		var_dump($array);
		$stmt = self::$_connection->prepare($sql);
    	//$stmt->execute(['subject'=>$subject, 'programId'=>$programId, 'price_lower'=>$price_lower, 'price_upper'=>$price_upper]);
		$stmt->execute($array);
		
        $stmt->setFetchMode(PDO::FETCH_CLASS, "Tutor");
		return $stmt->fetchAll();

	}

}


?>