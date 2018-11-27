<?php
class Message extends Model {

	var $messageId;
	var $senderId;
	var $receiverId;
	var $messageText;

	public function insert() {

	}

	public function getMessages($threadId){
		$sql = "SELECT * FROM message WHERE threadId = :threadId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['threadId'=>$threadId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
		return $stmt->fetchAll();
		
	}

}


?>