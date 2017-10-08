<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21.9.2017 г.
 * Time: 22:32
 */
$names = array();
$ages = array();

if(isset($_GET['filter'])) {
	$delimiter = $_GET['delimiter'];
	$name = $_GET['names'];
	$age = $_GET['ages'];

	$names = explode($delimiter,$name);
	$ages  = explode($delimiter,$age);
}
print_r($names);
include 'frontend.php';