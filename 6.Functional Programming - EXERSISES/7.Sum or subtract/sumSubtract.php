<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 11:06
 */
$input = [
	['sum', 12, 156],
	['subtract', 5, 6],
	['subtract', 1, 2],
	['sum', 12, 13],
	['subtract', 3, 3],
	['sum', 1, 2]
];
$name = ($input[1]);
$opSum = function (float $a, float $b): float {
	return $a + $b;
};
$opSubtract = function (float $a, float $b): float {
	return $a - $b;
};
$simpleCalc =
	function (callable &$simpleCalc, array $input, $i = 0, array $output = [])
	use ($opSum, $opSubtract) : array {
		if ($i < count($input)) {
			$op = $input[$i][0];
			$a = $input[$i][1];
			$b = $input[$i][2];
			if ($a < 0 || $a > 100 || $b < 0 || $b > 100) {
				$output[] = 'error';
				return $simpleCalc($simpleCalc, $input, $i + 1, $output);
			}
			if ($op == 'sum') {
				$output[] = $opSum($a, $b);
			} elseif ($op == 'subtract') {
				$output[] = $opSubtract($a, $b);
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