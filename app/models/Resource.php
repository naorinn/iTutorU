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
		$sql = "INSERT INTO resource (resourceName, description, source) VALUES (:resourceName, :description, :source)";
		$stmt = self::$_connection->prepare($sql);
		
		$id = $stmt->execute(['resourceName'=>$this->resourceName, 'description'=>$this->description, 'source'=>$this->source]);
		return self::$_connection->lastInsertId();
	}

	public function getResources() {
		$sql = "SELECT * FROM resource order by resourceName";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute();
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Resource');
		return $stmt->fetchAll();
	}


}

?>