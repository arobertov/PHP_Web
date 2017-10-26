<?php
include "db_config.php";
include "Carshop.php";
$sales = new Carshop($db);
$sales->getSalesWithName();