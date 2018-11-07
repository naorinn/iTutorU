<?php 

class Program extends Model{

	var $programName;


	public function __construct() {
		parent::__construct();
	}

	

	public function getPrograms() {
		$sql = "SELECT programName FROM Program";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, "Program");
		return $stmt->fetchAll();
	}

}
?>