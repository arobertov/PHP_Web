<?php
 namespace Cars;
class DBConfig {
private $db_host     = "localhost";
private $db_name     = "car_sales";
private $db_user     = "root";
private $db_password = '';

public function setDB() {
	$db = new PDO( "mysql:dbname=" . $this->db_name . ";host=" .$this->db_host,
		$this->db_user,$this->db_password );
	$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	return $db;
}
}