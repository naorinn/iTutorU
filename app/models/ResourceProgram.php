<?php
class ResourceProgram extends Model {

	var $resourceId;
	var $programId;

	public function insert() {
		$sql = "INSERT INTO resourceprogram (resourceId, programId) VALUES (:resourceId, :programId)";
		$stmt = self::$_connection->prepare($sql);
		$stmt->execute(['resourceId'=>$this->resourceId, 'programId'=>$this->programId]);
	}
}


?>