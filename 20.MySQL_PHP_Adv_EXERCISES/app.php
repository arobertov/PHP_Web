<?php

spl_autoload_register(function ($class_name) {
	include $class_name . '.php';
});
$db = new Cars\DBConfig();
$shop = new Cars\Carshop($db->setDB());
$shop->main();