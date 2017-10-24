<?php
include ('Employee.php');
include ('db_config.php');

$input = explode(',',trim(fgets(STDIN)));
if(count($input)>3 || count($input)<3 || $input[0]!='Info'){
	die('Invalid input data');
}
try {
	$employee = new Employee($db);
	$result = $employee->getPhone($input[1], $input[2]);
	$id = -1;
	foreach ($result as $colon => $row) {
		if ($id != -1 && $id != $row['id'])
			echo "---------------------------- \n";
		if ($id == $row['id']) {
			printPhone($row);
		} else {
			echo "{$row['id']},{$row['first_name']},{$row['middle_name']},{$row['last_name']},{$row['department']},{$row['position']}\n";
			printPhone($row);
		}

		$id = $row['id'];
	}
} catch (Exception $e){
	$e->getMessage();
}
function isPhone($phone){
	if($phone!=null){
		return true;
	}
	return false;
}

function printPhone($row){
	if(isPhone($row['work_phone']))
		echo "work:{$row['work_phone']}";
	if (isPhone($row['personal_phone'])) {
		echo " ,personal:{$row['personal_phone']} \n";
	}else {
		echo "\n";
	}
}