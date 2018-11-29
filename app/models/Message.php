<?php
class Message extends Model {

	var $messageId;
	var $senderId;
	var $threadId;
	var $messageText;

	public function insert() {
		$sql = "INSERT INTO message(threadId, senderId, messageText) 
				VALUES(:threadId, :senderId, :messageText)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['threadId'=>$this->threadId, 'senderId'=>$this->senderId, 'messageText'=>$this->messageText]);
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