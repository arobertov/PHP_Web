<?php
include "../geography_db.php";
include "../mypdo.php";
try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user,
        $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $countries = $db->query("SELECT `a`.`country_name`
FROM `countries` AS `a`,`continents` AS `b`
WHERE `a`.`continent_code`=`b`.`continent_code`
AND `a`.`population` > 1000000000",PDO::FETCH_ASSOC);
    foreach ($countries as $country){
        echo "$country[country_name] \n";
}
    $continents = null; // Close connection
    $db = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<\br>";
}