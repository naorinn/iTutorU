<?php 

class Note extends Model{

	var $noteId;
	var $noteText;
	var $timestamp;

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql= "INSERT INTO Note (noteText) VALUES (:noteText)";
		$stmt = self::$_connection->prepare($sql);
		

		$stmt->execute(['noteText'=>$this->noteText]);
		return self::$_connection->lastInsertId();				
	}
	
	public function getNotes($userId){
		$sql = "SELECT * FROM note n, usernote u WHERE u.userId = :userId AND n.noteId = u.noteId";
		$stmt = self::$_connection->prepare($sql);

		$stmt->execute(['userId'=>$userId]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, "Note");
		return $stmt->fetchAll();
	}
	

	public function deleteNote($userId){

		$sql = "DELETE FROM note n, usernote u WHERE n.noteId = u.noteId AND u.userId = :userId";
		$stmt = self::$_connection->prepare($sql);

		$stmt->execute();	
	}


	public function update(){

		$sql = "UPDATE Note n, usernote u SET noteText = :noteText
				WHERE u.userId=:userId AND n.noteId = u.noteId";

		$stmt = self::$_connection->prepare($sql);

		$stmt = execute();

	}

}
?>