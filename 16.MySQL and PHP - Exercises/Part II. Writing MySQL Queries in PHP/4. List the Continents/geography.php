<?php
include "../geography_db.php";
include "../mypdo.php";
try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user,
$db_password);
$db->setErrorException(); // Throw exception on all errors
$continents = $db->query("SELECT * FROM `continents`",PDO::FETCH_ASSOC);
foreach ($continents as $continent) {
    echo "$continent[continent_name] ";
    echo "($continent[continent_code]), ";

    }
$continents = null; // Close connection
$db = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<\br>";
}