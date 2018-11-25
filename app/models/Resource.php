<?php
class Resource extends Model {
var $resourceId;
var $resourceName;
var $source;
var $description;

	public function __construct() {
		parent::__construct();
	}

	public function insert() {

	}

	public function getResources() {
		$sql = "SELECT * FROM resource";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Resource');
		return $stmt->fetchAll();
	}


}

?>