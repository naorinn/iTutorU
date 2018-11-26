<?php 
class Thread extends Model {
	var $firstUserId;
	var $secondUserId;

	public function insert() {


	}

	public function getUserThreads($userId){
		$sql = "SELECT * FROM thread t, profile p
		WHERE p.userId = t.firstUserId || p.userId = t.secondUserId AND
		(firstUserId = :userId || secondUserId = :secondUserId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['firstUserId'=>$this->firstUserId, 'secondUserId'=>$this->secondUserId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Thread");
		return $stmt->fetchAll();
	}

}


?>