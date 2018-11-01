<?php
class User extends Model 
{
	var $

	public function __construct() {
		parent::__construct();
	}

	public function insert(){
		$sql= "INSERT INTO Client (first_name, last_name) VALUES (:first_name, :last_name)";
		$sth = self::$_connection->prepare($sql);
		$sth->execute(['first_name'=>$this->first_name, 'last_name'=>$this->last_name]);
	}
}


?>