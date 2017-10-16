<?php
include ('Pet.php');

function findBirthday (array $arr,string $ids) {
	foreach ($arr as $obj){
		if($obj->findBirthDateYear($ids))
			echo $obj->findBirthDateYear($ids).PHP_EOL;
	}
}

$arr = [];

while (1){
	$input = explode(' ',trim(fgets(STDIN)));
	if($input[0]=='End'){
		break;
	}

	if($input[0] == 'Citizen'){
		list($n,$name,$age,$id,$birthDate) = $input;
		$arr[] = $citizen = new Citizen($name,$age,$id,$birthDate);
	}elseif ($input[0] == 'Pet'){
		list($n,$name,$birthDate) = $input;
		$arr[] = $pet = new Pet($name,$birthDate);
	} elseif ($input[0] == 'Robot'){
		list($n,$name,$id)=$input;
		$arr[] = $robot = new Robot($name,$id);
	}
}
$ids = trim(fgets(STDIN));

findBirthday($arr,$ids);



