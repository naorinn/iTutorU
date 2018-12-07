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

	public function getMessages(){

		$sql = "SELECT * FROM message m, thread t, profile p 
				WHERE m.threadId = t.threadId
				AND (p.userId = t.firstUserId OR p.userId = t.secondUserId)
				AND p.userId != :userId AND m.threadId = :threadId";
		
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['threadId'=>$this->threadId, 'userId'=>$this->senderId]);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Message');
		return $stmt->fetchAll();
		
	}

}


?>