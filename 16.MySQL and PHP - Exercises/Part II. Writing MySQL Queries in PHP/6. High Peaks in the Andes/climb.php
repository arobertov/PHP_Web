<?php
include ('../geography_db.php');
include ('../mypdo.php');

try {
    $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user,
        $db_password);
    $db->setErrorException(); // Throw exception on all errors
    $peaks = $db->query("SELECT `peak_name`,`elevation` FROM `geography`.peaks WHERE `elevation` > 6700 and `mountain_id`=3",
        PDO::FETCH_ASSOC);
    foreach ($peaks as $peak){
        echo "$peak[peak_name], $peak[elevation]m \n";
    }
    $continents = null; // Close connection
    $db = null;
} catch (PDOException $e) {
    print "PDO Error: " . $e->getMessage() . "<\br>";
}