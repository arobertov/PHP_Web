<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 22.9.2017 г.
 * Time: 12:52
 */
$input = trim(fgets(STDIN));
$strlen = strlen($input);
if($strlen>20) {
	for ( $i = 0; $i < 20; $i ++ ) {
	   echo $input[$i];
	}
}
else {
	$star = 20 - $strlen;
	for($i=0;$i<$strlen;$i++)
		echo $input[$i];
	for($j=0;$j<$star;$j++)
		echo "*";
}