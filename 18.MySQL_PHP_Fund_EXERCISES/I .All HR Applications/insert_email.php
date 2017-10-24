<?php
include ('Employee.php');
include ('db_config.php');

while (1){
	try{
    $input = explode('emails,',trim(fgets(STDIN)));
    if($input[0]=='End'){
        break;
    }
    $name = explode(',',$input[0]);
    $emails = $input[1];

    list($firstName,$middleName,$lastName)=$name;
    $employee = new Employee($db);
    $employee ->insertEmail($firstName,$middleName,$lastName,$emails);
   } catch (Exception $e){
		echo $e->getMessage();
	}
}