<?php
include('../geography_db.php');
include ('../mypdo.php');

while (1) {
	$input = trim(fgets(STDIN));
	if($input == 'Bye'){
		echo 'Good bye!';
		break;
	}
	try {
		$db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user,
			$db_password);
		$db->setErrorException(); // Throw exception on all errors

		$db_stm = $db->prepare("SELECT `a`.`country_name`,`a`.`capital`, `b`.`continent_name`,`c`.`description`
								FROM `countries` AS `a`,`continents` AS `b`,`currencies` AS `c`
								WHERE  (`a`.`iso_code` = :input OR `a`.`country_code` = :input) AND `a`.`continent_code` = `b`.`continent_code` 
								AND `a`.`currency_code` = `c`.`currency_code`"
		);
		$db_stm->bindParam('input', $input);
		if ($db_stm->execute() && $db_stm->rowCount()>0){
			while ($row = $db_stm->fetch(PDO::FETCH_ASSOC)) {
				echo 'Country: ' . $row['country_name'] . PHP_EOL;
				echo 'Capital: ' . $row['capital'] . PHP_EOL;
				echo 'Currency: ' . $row['description'].PHP_EOL;
				echo 'Continent:' . $row['continent_name'].PHP_EOL;
			}
		}else echo "N\A \n";
		$db_stm = null; // Close connection
		$db = null;
	} catch (PDOException $e) {
		print "PDO Error: " . $e->getMessage() . "<\br>";
	}
} 