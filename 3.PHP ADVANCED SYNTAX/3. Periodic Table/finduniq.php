<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 11:32
 */
$input = trim(fgets(STDIN));
$arr = explode(', ',$input);
$counter = 0;
$uniq = [];
foreach ($arr as $value){
	for($i=0;$i<count($arr);$i++){
		if($arr[$i]==$value){
			$counter++;
		}
	}
	if($counter <=1){
		$uniq[] = $value;
	}
	$counter = 0;
}
foreach ($uniq as $v){
	echo "$v ";
}