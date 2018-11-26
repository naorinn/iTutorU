<?php
class Request extends Model 
{

	var $tutorId;
	var $userId;
	var $request_date;
	var $request_time;
	var $details;

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql = "INSERT INTO Request(tutorId, userId, details, request_date, request_time) 
				VALUES (:tutorId, :userId, :details, :request_date, :request_time)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['tutorId'=>$this->tutorId, 'userId'=>$this->userId, 'details'=>$this->details, 'request_date'=>$this->request_date, 'request_time'=>$this->request_time]);
	}

	public function getReceivedRequests() {
		$sql = "SELECT * FROM request, profile WHERE request.userId = profile.userId";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Request');
		return $stmt->fetchAll();
	}


	public function delete() {

	}

	public function update() {
		
	}
}

?>