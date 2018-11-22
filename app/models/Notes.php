<?php 

class Notes extends Model{

	var $noteId;
	var $noteText;
	var $timestamp;

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql= "INSERT INTO Note (noteId, noteText, time_stamp) VALUES (:noteId, :noteText, :time_stamp)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['noteId'=>$this->noteId,'noteText'=>$this->noteText, 'time_stamp'=>$this->time_stamp]);

		$sql= "INSERT INTO Usernote (userId, noteId) VALUES (:userId, :noteId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['userId'=>$this->userId,'noteId'=>$this->noteId]);						
	}
	
	public function getNotes($userId){
		$sql = "SELECT * FROM note n, usernote u WHERE u.userId = :userId AND n.noteId = u.noteId";
		$stmt = self::$_connection->prepare($sql);

		$stmt->execute(['userId'=>$userId]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, "Notes");
		return $stmt->fetchAll();
	}
	


}
?>