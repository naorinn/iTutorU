<?php

class Contact {

	var $client_id;
	var $contact_id;
	var $information;
	var $type;

	public function getContacts($client_id) {
		$sql = "SELECT * FROM Contact WHERE client_id = :client_id";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['client_id'=>$client_id]);
		return $stmt->fetch()
		
	}

/*public function find($client_id) {
		$sql = "SELECT * FROM Client WHERE client_id=:client_id";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['client_id'=>$client_id]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, "Client");
		return $stmt->fetch();
	}*/


}
?>