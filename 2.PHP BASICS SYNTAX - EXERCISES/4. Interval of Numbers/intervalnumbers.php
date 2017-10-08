<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 22.9.2017 г.
 * Time: 11:30
 */
$inputOne = intval(fgets(STDIN));
$inputTwo = intval(fgets(STDIN));

if($inputOne<$inputTwo) {
	$start = $inputOne;
	$end = $inputTwo;
} else {
	$start = $inputTwo;
	$end = $inputOne;
}

for ($i=$start;$i<=$end;$i++){
	echo $i."\n";
}