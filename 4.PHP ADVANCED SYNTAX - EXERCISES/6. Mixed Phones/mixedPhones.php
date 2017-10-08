<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 25.9.2017 г.
 * Time: 16:11
 */
$phoneList = [];
while (true){
	$input = trim(fgets(STDIN));
	if($input=='Over'){
		break;
	}
	$arr = explode(':',$input);
	foreach ($arr as $key=>$data){
		$arr[$key] = trim($data);
	}
	if(intval($arr[0])){
	$temp = $arr[1];
	$arr[1] = $arr[0];
	$arr[0] = $temp;
	}
	 $phoneList[$arr[0]]  = $arr[1];
}
ksort($phoneList);
foreach ($phoneList as $key=>$value){
	echo "$key -> $value \n";
}