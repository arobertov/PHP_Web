<?php
include ('Employee.php');
include ('db_config.php');
echo"Please enter command \"Delete\" and insert id:";
$input = explode(',',trim(fgets(STDIN)));
if($input[0]!='Delete' || count($input)>2 || count($input)<2){
	die('Invalid input data !');
}
$employee = new Employee($db);
$employee->deleteEmail($input[1]);
die('Delete employee email successfully !');