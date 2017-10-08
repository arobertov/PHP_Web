<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 10:52
 */
$text = trim(fgets(STDIN));
$letters = [];
$text = strtoupper($text);

for ($i = 0; $i < strlen($text); $i++) {
	$char = $text[$i];
	if (ord($char) >= ord('A') && ord($char) <= ord('Z')) {
		if (isset($letters[$char])) {
			$letters[$char]++;
		} else {
			$letters[$char] = 1;
		}
	}
}
foreach ($letters as $key=>$value){
	echo '[';
	echo '"'.$key.'" => "'.$value.'",';
	echo ']';
}