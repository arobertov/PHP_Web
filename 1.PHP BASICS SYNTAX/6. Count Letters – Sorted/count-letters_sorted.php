<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21.9.2017 г.
 * Time: 20:40
 */
$input = trim(fgets(STDIN));
$result = array();
for($i=0;$i<strlen($input);$i++)
{
	$letter = $input[$i];
	if(! array_key_exists($letter,$result)){
		$result[$letter] = 0;
	}
	$result[$letter]++;
}
ksort($result,SORT_LOCALE_STRING);
foreach ($result as $key => $value) {
	echo $key ." -> ".$value ."\n";
}