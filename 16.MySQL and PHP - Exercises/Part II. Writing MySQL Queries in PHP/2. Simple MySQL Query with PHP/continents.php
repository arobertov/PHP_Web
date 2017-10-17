<?php
include('../../geography.php');

$continents = $db->query("SELECT * FROM `continents`");
foreach($continents as $i => $continent){
    print_r($continent);
    echo ("\r\n");
}