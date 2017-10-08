<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 12:25
 */
// Declare function
function isVolume($x,$y,$z) {
	$x1 = 10; $x2 = 50;
	$y1 = 20; $y2 = 80;
	$z1 = 15; $z2 = 50;

	if($x >= $x1 && $x <= $x2) {
		if($y >= $y1 && $y <= $y2){
			if($z >= $z1 && $z <= $z2){
				return true;
			}
		}
	}
	return false;
}

//read input and usage function
$input = trim(fgets(STDIN));
$arr = explode(', ',$input);
$inputNum = count($arr);
for($i=0;$i<$inputNum;$i+=3){
	$x = $arr[$i];
	$y = $arr[$i+1];
	$z = $arr[$i+2];

	if(isVolume($x,$y,$z)){
		echo "inside \n";
	}  else {
		echo "outside \n";
	}
}