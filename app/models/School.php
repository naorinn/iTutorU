<?php 

class School extends Model{

	var $name;


	public function __construct() {
		parent::__construct();
	}

	

	public function getSchools() {
		$sql = "SELECT * FROM School";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "School");
		return $stmt->fetchAll();
	}

}
?>