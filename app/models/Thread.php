<?php 
class Thread extends Model {
	var $firstUserId;
	var $secondUserId;

	public function insert() {


	}

	public function getUserThreads($userId){
		/*$sql = "SELECT * FROM thread t, profile p
		WHERE p.userId = t.firstUserId || p.userId = t.secondUserId AND
		(firstUserId = :userId || secondUserId = :secondUserId)";*/

		$sql = "SELECT * FROM profile p, thread t
				WHERE (p.userId = t.firstUserId OR p.userId = t.secondUserId)
				AND (t.firstUserId = :userId OR t.secondUserId = :userId)
				AND p.userid != :userId;";

		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$userId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Thread");
		return $stmt->fetchAll();
	}

}
/*
select * from profile p, thread t
where (p.userId = t.firstUserId OR p.userId = t.secondUserId)
and (t.firstUserId = 2 OR t.secondUserId = 2)
and p.userid != 2;
*/

?>