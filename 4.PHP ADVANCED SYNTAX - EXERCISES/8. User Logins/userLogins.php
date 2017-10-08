<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 26.9.2017 г.
 * Time: 10:07
 */

$mode = 'reg';
$failed = 0;
$users=[];
while (true){
	$input = trim(fgets(STDIN));
	if($input == 'end'){
		break;
	}
	if($input == 'login') {
		$mode = 'login';
		continue;
	}
	$arr = explode( ' -> ', $input );

	if($mode == 'reg') {
		$users[$arr[0]] = $arr[1];
	} else {
		if (array_key_exists($arr[0],$users) && $users[$arr[0]] == $arr[1]){
			echo "$arr[0]: logged in successfully . \n ";
		} else {
			echo "$arr[0]: login failed \n";
			$failed ++;
		}
	}

}
echo "unsuccessful login attempts: $failed  \n";
