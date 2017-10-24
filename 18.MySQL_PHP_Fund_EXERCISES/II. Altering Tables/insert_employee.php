<?php
include ('Employee.php');
include ('db_config.php');

$employee = new Employee($db);
while (1) {
	$input = explode(',',trim(fgets(STDIN)));
	if($input[0]=='End'){
		echo 'Bye';
		break;
	}
    if(count($input)< 7 || count($input)> 7){
        echo "Error: Please, check your input syntax. \n";
        continue;
    }
    list($firstName, $middleName, $lastName, $department, $position, $passportId,$country) = $input;
    if ($result = $employee->insertEmployee($firstName, $middleName, $lastName, $department, $position, $passportId,$country)) {
        echo "New employee $firstName $middleName $lastName  saved. \n";
    }
}