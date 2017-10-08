<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 18:58
 */
$letterCount = [];
$counter=0;
$input = trim(fgets(STDIN));

for($i=0;$i<strlen($input);$i++){
	for($j=0;$j<strlen($input);$j++){
		if($input[$i]==$input[$j]){
			$counter++;
		}
	}
	$letterCount[$input[$i]]=$counter;
	$counter=0;
}
foreach ($letterCount as $key=>$value){
	echo "$key -> $value \n";
}