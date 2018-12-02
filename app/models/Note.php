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
	
	public function getNotes($userId, $searchWord = ''){

		$execute_array = [];
		$searchSql = "";

		$execute_array['userId'] = $userId;
		if($searchWord != '')
		{
			$searchSql = " AND n.noteText LIKE :searchWord";
			$searchWord = "%$searchWord%";
			$execute_array['searchWord'] = $searchWord;
			
			
		}

		$sql = "SELECT * FROM note n, usernote u WHERE u.userId = :userId AND n.noteId = u.noteId".$searchSql;
		$stmt = self::$_connection->prepare($sql);

		$stmt->execute($execute_array);

		$stmt->setFetchMode(PDO::FETCH_CLASS, "Note");
		return $stmt->fetchAll();
	}
	

	public function delete(){
		$sql = "DELETE FROM note WHERE noteId = :noteId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['noteId'=>$this->noteId]);

		$sql = "DELETE FROM usernote WHERE noteId = :noteId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['noteId'=>$this->noteId]);

	}

	public function getNoteById($noteId){
		$sql = "SELECT * FROM note WHERE noteId = :noteId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['noteId'=>$noteId]);	
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Note");
		return $stmt->fetch();

	}

	public function update(){
		$sql = "UPDATE note SET noteText = :noteText
				WHERE noteId = :noteId";
		$stmt = self::$_connection->prepare($sql);

		$stmt->execute(['noteId'=>$this->noteId, 'noteText'=>$this->noteText]);

	}

}
?>