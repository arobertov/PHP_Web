<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 11:01
 */
$input = 'Hello, there! ';
$n = 3;
$repeatString = function (&$repeatString, &$input,  $n = 1,  $out = "") {
	return $n > 0 ?
		$repeatString($repeatString, $input, $n - 1, $out .= $input) : // Recursion
		$out;
}; // anonymous function
echo $repeatString($repeatString, $input, $n);