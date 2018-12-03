<?php
class Session extends Model {
	var $sessionId;
	var $tutorId;
	var $userId;
	var $session_date;

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql = "INSERT INTO session(tutorId, userId, session_date) VALUES(:tutorId, :userId, :session_date)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['tutorId'=>$this->tutorId, 'userId'=>$this->userId, 'session_date'=>$this->session_date]);
	}

	public function edit(){

	}

	public function delete(){

	}

	public function getSessions() {
		$sql = "SELECT * FROM session s, profile p
				WHERE (s.userId = p.userId OR s.tutorId = p.userId)
				AND p.userId != :userId
				AND (s.tutorId = :tutorId OR s.userId = :userId)
				ORDER BY session_date";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$this->userId, 'tutorId'=>$this->tutorId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
		return $stmt->fetchAll();
	}

	public function getUserSessions() {
		$sql = "SELECT * FROM session WHERE userId = :userId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$this->userId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
		return $stmt->fetchAll();
	}

	public function getTutorSessions() {
		$sql = "SELECT * FROM session WHERE tutorId = :tutorId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['tutorId'=>$this->tutorId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
		return $stmt->fetchAll();
	}



}

?>