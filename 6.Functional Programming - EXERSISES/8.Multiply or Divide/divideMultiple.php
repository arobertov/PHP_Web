<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 11:07
 */
$input = [
	['divide', 0, 40],
	['divide', 6, 'P123'],
	['divide', '3qwe', 2],
	['multiply', 2, 2],
	['divide', 6, 2],
	['sum', 12, 156],
	['subtract', 5, 6],
	['subtract', 1, 2],
	['sum', 12, 13],
	['subtract', 3, 3],
	['sum', 1, 2]
];
$opMultiply = function ($a, $b) {
	return $a * $b;
};
$opDivide = function ($a, $b){
	return $a / $b;
};
$opSum = function ($a, $b) {
	return $a + $b;
};
$opSubtract = function ($a, $b){
	return $a - $b;
};
$simpleCalc = function (callable &$simpleCalc, array $input, $i = 0, array $output = [])
use ($opSum, $opSubtract, $opMultiply, $opDivide) : array {
	if ($i < count($input)) {
		$op = $input[$i][0];
		if (!is_numeric($input[$i][1])) {
			$output[] = 'op1_not_numeric';
			return $simpleCalc($simpleCalc, $input, $i + 1, $output);
		} elseif (!is_numeric($input[$i][2])) {
			$output[] = 'op2_not_numeric';
			return $simpleCalc($simpleCalc, $input, $i + 1, $output);
		}
		$a = floatval($input[$i][1]);
		$b = floatval($input[$i][2]);
		if ($a < 0 || $a > 100 || $b < 0 || $b > 100) {
			$output[] = 'out_of_range';
			return $simpleCalc($simpleCalc, $input, $i + 1, $output);
		}
		if ($op == 'sum') {
			$output[] = $opSum($a, $b);
		} elseif ($op == 'subtract') {
			$output[] = $opSubtract($a, $b);
		} elseif ($op == 'divide') {
			if ($a == 0 || $b == 0) {
				$output[] = 'division_by_zero';
				return $simpleCalc($simpleCalc, $input, $i + 1, $output);
			}
			$output[] = $opDivide($a, $b);
		} elseif ($op == 'multiply') {
			$output[] = $opMultiply($a, $b);
		}
		return $simpleCalc($simpleCalc, $input, $i + 1, $output);
	}
	return $output;
};
printResult($simpleCalc($simpleCalc, $input));
function printResult(array $output) {
	echo '[';
	echo implode(', ', $output);
	echo ']';
};