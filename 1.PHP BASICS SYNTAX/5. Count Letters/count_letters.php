<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21.9.2017 г.
 * Time: 18:54
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
foreach ($result as $key => $value) {
	echo $key ." -> ".$value ."\n";
}
