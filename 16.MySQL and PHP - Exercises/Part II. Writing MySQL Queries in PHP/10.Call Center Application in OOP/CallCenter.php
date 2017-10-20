<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 19.10.2017 г.
 * Time: 10:47
 */
 include ('Database.php');
class CallCenter {
	/**
	 * @var object
	 */
	private $db_instance;

	private function connectDB() {
		$conn = new Database();
		$this->db_instance = $conn->connect();
	}

	public function __construct() {
		$this->connectDB();
	}

	public function main ($num){
		if($num == 1) {
			while ( 'Bye' != $input = trim( fgets( STDIN ) ) ) {
				$this->callCenter( $input );
			}
		} elseif($num == 2){
			while ( 'Bye' != $input = trim( fgets( STDIN ) ) ) {
				$this->currencyContinent( $input );
			}
		} elseif ($num == 3){
			while ( 'Bye' != $input = trim( fgets( STDIN ) ) ) {
				$this->skiEquipment( $input );
			}
		} elseif ($num == 4){
			while ( 'Bye' != $input =str_replace (',','',trim( fgets( STDIN )) ) ) {
				$input = explode(' ',$input);

				$country = $input[1];
				$firstName = $input[2];
				$secondName = $input[3];
				$countryCode = $this->checkCountry( $input[1] );
				$result = $this->addCustomer($country,$firstName,$secondName,$countryCode);
				if($result){
					echo 'Name: '.$firstName.PHP_EOL;
					echo 'Family: '.$secondName.PHP_EOL;
				}
			}
		}

	}
	//---------------------- add Customer --------------------------------//
	private function addCustomer($country,$firstName,$secondName,$countryCode){
		try{
			 $db_stm = $this->db_instance->prepare("INSERT INTO `customers`(`customer_name`,`customer_family`,`country_code`) 
													VALUES (:firstName,:secondName,:countryCode)
													");
			$db_stm->bindParam('firstName',$firstName);
			$db_stm->bindParam('secondName',$secondName);
			$db_stm->bindParam('countryCode',$countryCode);
			if($db_stm->execute()){
				return true;
			} else return false;
		} catch (PDOException $e) {
			print "PDO Error: " . $e->getMessage() . "<\br>";
		}
	}
	// ---------------------- check Country -------------------------------//

	private function checkCountry($input){
		try{
			$db_stm = $this->getCountryData($input);
			if ($db_stm->execute() && $db_stm->rowCount()>0){
				while ($row = $db_stm->fetch(PDO::FETCH_ASSOC)) {
					echo 'Country: ' . $row['country_name'] . PHP_EOL;
					echo 'Capital: ' . $row['capital'] . PHP_EOL;
					echo 'Currency: ' . $row['description'].PHP_EOL;
					echo 'Continent:' . $row['continent_name'].PHP_EOL;
					echo PHP_EOL;
					return $row['country_code'];
				}
			}else {
				die( 'Exception: Country doesn\'t exist. !');

			}
		}  catch (PDOException $e) {
			print "PDO Error: " . $e->getMessage() . "<\br>";
		}
		return true;
	}

	// ------------------------ end Customer ------------------------------//
	// ----------------- common method ------------------------------------//
	private function getCountryData($input){
		$db_stm = $this->db_instance->prepare(
			"SELECT `a`.`country_name`,`a`.`capital`,`a`.`country_code`, `b`.`continent_name`,`c`.`description`
								FROM `countries` AS `a`,`continents` AS `b`,`currencies` AS `c`
								WHERE  (`a`.`iso_code` = :input OR `a`.`country_code` = :input OR `a`.`country_name` = :input) 
								AND `a`.`continent_code` = `b`.`continent_code` 
								AND `a`.`currency_code` = `c`.`currency_code`"
		);
		$db_stm->bindParam('input', $input);

		return $db_stm;
	}
   // ---------------------

	private function skiEquipment($input){
		try {
			$db_stm = $this->getCountryData($input);
			if ($db_stm->execute() && $db_stm->rowCount()>0){
				while ($row = $db_stm->fetch(PDO::FETCH_ASSOC)) {
					echo 'Country: ' . $row['country_name'] . PHP_EOL;
					echo 'Capital: ' . $row['capital'] . PHP_EOL;
					echo 'Currency: ' . $row['description'].PHP_EOL;
					echo 'Continent:' . $row['continent_name'].PHP_EOL;
					echo PHP_EOL;
				}
			}else {
				echo 'No record data in database !'.PHP_EOL;
			}
			$peak = $this->db_instance->prepare("SELECT `a`.`elevation` 
							FROM `peaks`  AS `a`, `mountains_countries` AS `b` 
							WHERE `b`.country_code = :input 	
							AND `a`.mountain_id = `b`.mountain_id 
							AND `a`.`elevation` >= 4000
							");
			$peak->bindParam('input',$input);
			if($peak->execute() && $peak->rowCount()>0){
				echo 'Forward customer for special offers! Show high
mountain special equipment offers!'.PHP_EOL;
			}
		} catch (PDOException $e) {
				print "PDO Error: " . $e->getMessage() . "<\br>";
			}
	}
	
	private function currencyContinent($input){
		try {
			$db_stm = $this->db_instance->prepare(
				"SELECT `a`.`country_name`,`a`.`capital`, `b`.`continent_name`,`c`.`description`
				FROM `countries` AS `a`,`continents` AS `b`,`currencies` AS `c`
  				WHERE  (`a`.`iso_code` = :input OR `a`.`country_code` = :input) AND `a`.`continent_code` = `b`.`continent_code` 
				AND `a`.`currency_code` = `c`.`currency_code`"
			);
			$db_stm->bindParam('input',$input);
			if($db_stm->execute() && $db_stm->rowCount()>0) {
				foreach ( $db_stm as $row ) {
					echo 'Country: ' . $row['country_name'] . PHP_EOL;
					echo 'Capital: ' . $row['capital'] . PHP_EOL;
					echo 'Currency: ' . $row['description'].PHP_EOL;
					echo 'Continent:' . $row['continent_name'].PHP_EOL;
				}
			} else {
				echo 'No record data in database !'.PHP_EOL;
			}
			$db_stm = null; // Close connection
		} catch (PDOException $e) {
			print "PDO Error: " . $e->getMessage() . "<\br>";
		}
	}

	private function callCenter($input){
		try {
			$db_stm = $this->db_instance->prepare(
				"SELECT `country_name`,`capital` FROM `countries`
                            WHERE `country_code` = :input 
                            OR `iso_code` = :input
                            OR `country_name`= :input"
			);
			$db_stm->bindParam('input',$input);
			 if($db_stm->execute() && $db_stm->rowCount()>0) {
				 foreach ( $db_stm as $row ) {
					 echo 'Country: ' . $row['country_name'] . PHP_EOL;
					 echo 'Capital: ' . $row['capital'] . PHP_EOL;
				 }
			 } else {
			 	echo 'No record data in database !'.PHP_EOL;
			 }
			$db_stm = null; // Close connection
		} catch (PDOException $e) {
			print "PDO Error: " . $e->getMessage() . "<\br>";
		}
	}
}