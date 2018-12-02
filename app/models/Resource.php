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

	public function getResources($search = '', $programId = '') {
		$searchSql = "";
		$programSql = "";

		$execute_array = [];

		if($search != ''){
			$searchSql = " AND (r.resourceName LIKE :search OR r.description LIKE :search OR r.source LIKE :search)";
			$search = "%$search%";
			$execute_array['search'] = $search;
		}

		if($programId != '') {
			$programSql = " AND p.programId = :programId";		
			$execute_array['programId'] = $programId;
		}
				
		$sql = "SELECT DISTINCT r.resourceId, r.resourceName, r.description, r.source FROM resource r, resourceprogram p WHERE r.resourceId = p.resourceId".$searchSql.$programSql;

		$stmt = self::$_connection->prepare($sql);		
		$stmt->execute($execute_array);
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Resource');
		return $stmt->fetchAll();
	}




}

?>