<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21.9.2017 г.
 * Time: 21:56
 */
if(isset($_GET['calculate'])) {
	$operation = $_GET['operation'];
	$numberOne = $_GET['number_one'];
	$numberTwo = $_GET['number_two'];
	$output    = "";
	if ( $operation == "sum" ) {
		$output = ( $numberOne + $numberTwo );
	} else if ( $operation == "subtract" ) {
		$output = ( $numberOne - $numberTwo );
	} else {
		$output = "Wrong operation supplied";
	}
}

include 'calculator_frontend.php';