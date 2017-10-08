<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 21:43
 */
$input = trim(fgets(STDIN));
$arr = explode(' ',$input);

$countNumber = array_count_values($arr);
ksort($countNumber);
foreach ($countNumber as $key=>$value){
	echo "$key -> $value \n";
}
	

