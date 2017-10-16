<?php
include ('Citizen.php');
$citizens = [];
$robots = [];
while (1){
	$input = explode(' ',trim(fgets(STDIN)));
	if($input[0]=='End'){
		break;
	}
	if(count($input) == 3){
		list($name,$age,$id) = $input;
		$citizens[] = $citizen = new Citizen($name,$age,$id);
	}elseif (count($input) == 2){
		list($name,$id)=$input;
		$robots[] = $robot = new Robot($name,$id);
	}
}
$ids = trim(fgets(STDIN));

foreach ($citizens as $citizen){
	if($citizen->findIds($ids)){
		echo $citizen->findIds($ids).PHP_EOL;
	}
}

foreach ($robots as $robot){
	if($robot->findIds($ids)){
		echo $robot->findIds($ids).PHP_EOL;
	}
}