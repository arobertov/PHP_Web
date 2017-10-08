<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 15:01
 */
include ('Employee.php');
$count = trim(fgets(STDIN));
$employers = [];
for($i=0;$i<$count;$i++){
	$input = explode(' ',trim(fgets(STDIN)));

	$roster = new Employee($input);

	$employers[$i] = $roster;
}

function cmp($a, $b)
{
	return strcmp($b->salary, $a->salary);
}

usort($employers, "cmp");
print_r($employers);