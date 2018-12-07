<?php 
class Thread extends Model {
	var $firstUserId;
	var $secondUserId;

	public function insert() {
		$sql = "INSERT INTO thread(firstUserId, secondUserId) 
				VALUES(:firstUserId, :secondUserId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['firstUserId'=>$this->firstUserId, 'secondUserId'=>$this->secondUserId]);
	}

	public function getUserThreads($userId){
		$sql = "SELECT * FROM profile p, thread t
				WHERE (p.userId = t.firstUserId OR p.userId = t.secondUserId)
				AND (t.firstUserId = :userId OR t.secondUserId = :userId)
				AND p.userid != :userId;";

		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$userId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Thread");
		return $stmt->fetchAll();
	}

	public function find($userId, $contactUserId) {
		$sql = "SELECT * FROM thread where (firstUserId = :contactUserId and secondUserId = :userid) or (firstUserId = :userid and secondUserId = :contactUserId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userid'=>$userId, 'contactUserId'=>$contactUserId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Thread");
		return $stmt->fetch();

	}
}
?>