<?php
include ('Employee.php');
include ('db_config.php');

$input = explode(',',trim(fgets(STDIN)));
if(count($input)>2 || count($input)<2 || $input[0]!='Info'){
	die('Invalid input data');
}
try {
	$employee = new Employee($db);
	$result = $employee->getEmailUseWildcard($input[1]);
	if(count($result)<1){
		die('No record employee this database !');
	}
	$id = -1;
	foreach ($result as $colon => $row) {
		if ($id != -1 && $id != $row['id'])
			echo "---------------------------- \n";
		if ($id == $row['id']) {
			printEmail($row);
		} else {
			echo "{$row['id']},{$row['first_name']},{$row['middle_name']},{$row['last_name']},{$row['department']},{$row['position']},from {$row['country']}\n";
			printEmail($row);
		}

		$id = $row['id'];
	}
} catch (Exception $e){
	$e->getMessage();
}
function isEmail($email){
	if($email!=null){
		return true;
	}
	return false;
}

function printEmail($row){
	if(isEmail($row['work_email']))
		echo "work:{$row['work_email']}";
	if (isEmail($row['personal_email'])) {
		echo " ,personal:{$row['personal_email']} \n";
	}else {
		echo "\n";
	}
}