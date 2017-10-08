<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 10:45
 */

$a = floatval(trim(fgets(STDIN)));
$b = floatval(trim(fgets(STDIN)));
$sum = function($a,$b){
	return $a + $b;
}; // anonymous function
echo $sum($a, $b);