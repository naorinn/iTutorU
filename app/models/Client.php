<?php 

class Client extends Model{

	var $first_name;
	var $last_name;	

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql= "INSERT INTO Client (first_name, last_name) VALUES (:first_name, :last_name)";
		$sth = self::$_connection->prepare($sql);
		$sth->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name]);
	}

	public function getAll() {
		$sql = "SELECT * FROM Client";
		$stmt = self::$_connection->prepare($sql);
		//$stmt->execute();

		$stmt->setFetchMode(PDO::FETCH_CLASS, "Client");
		return $stmt->fetchAll();
	}

	public function getContacts() {
		$contact = $this->model('Contact');
		$contacts = $contact->getContacts($this->client_id);
		return $contacts;
	}

	public function find($client_id) {
		$sql = "SELECT * FROM Client WHERE client_id=:client_id";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['client_id'=>$client_id]);

		$stmt->setFetchMode(PDO::FETCH_CLASS, "Client");
		return $stmt->fetch();
	}

}
?>