<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 11:24
 */
$text = trim(fgets(STDIN));
$arr = explode(', ',$text);
$sums = [];
for ($i = 0; $i < count($arr); $i += 2) {
	list($town, $income) = [$arr[$i], $arr[$i+1]];
	if ( ! isset($sums[$town])) {
		$sums[ $town ] = $income;
	} else {
		$sums[$town] += $income;
	}
}

foreach ($sums as $key=>$value) {
	echo '[';
	echo '"' . $key . '" => "' . $value . '",';
	echo ']';
}