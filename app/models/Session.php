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

	public function update(){
		$sql = "UPDATE session set session_date = :session_date WHERE sessionId = :sessionId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['session_date'=>$this->session_date, 'sessionId'=>$this->sessionId]);

	}

	public function delete(){
		$sql ="DELETE FROM session WHERE sessionId = :sessionId AND (userId = :userId OR tutorId = :userId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['sessionId'=>$this->sessionId, 'userId'=>$this->userId]);

	}

	public function getSessionById() {		
		$sql = "SELECT * FROM session s, profile p 
				WHERE (s.userId = p.userId OR s.tutorId = p.userId)
				AND p.userId != :userId
				AND s.sessionId = :sessionId 
				AND (s.userId = :userId OR s.tutorId = :userId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$this->userId, 'sessionId'=>$this->sessionId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Session");
		return $stmt->fetch();
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