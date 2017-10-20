<?php
include ('Employee.php');
include ('db_config.php');

$employee = new Employee($db);
while ('End'!= $input = explode(',',trim(fgets(STDIN)))) {
    if(count($input)< 6 || count($input)>6){
        echo "Error: Please, check your input syntax. \n";
        continue;
    }
    list($firstName, $middleName, $lastName, $department, $position, $passportId) = $input;
    if ($result = $employee->insertEmployee($firstName, $middleName, $lastName, $department, $position, $passportId)) {
        echo "New employee $firstName $middleName $lastName  saved. \n";
    }
}