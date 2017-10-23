<?php
include ('Employee.php');
include ('db_config.php');


while (1){
    $input = explode('phones,',trim(fgets(STDIN)));
    if($input[0]=='End'){
        break;
    }
    $name = explode(',',$input[0]);
    $phones = $input[1];

    list($firstName,$middleName,$lastName)=$name;
    $employee = new Employee($db);
    $employee->insertPhones($firstName,$middleName,$lastName,$phones);
}