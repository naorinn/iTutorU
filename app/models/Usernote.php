<?php 

class Usernote extends Model{

	var $userId;
	var $noteId;
	

	public function __construct() {
		parent::__construct();
	}


	public function insert() {

		$sql = "INSERT INTO usernote (userId, noteId) VALUES (:userId, :noteId)";
		
		$stmt = self::$_connection->prepare($sql);

		$stmt->execute(['userId'=>$this->userId, 'noteId'=>$this->noteId]);
	}



}
?>