<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 26.9.2017 г.
 * Time: 13:04
 */
function regEmpl($employees,$arr){
	if(is_numeric($arr[1]) && strpos($arr[1], ".") !== false)
	{
		$round = number_format($arr[1],2,'.',' ');
		$employees[$arr[0]]['Salary'] = $round;
		return $employees;
	} elseif(is_numeric($arr[1])){
		 $employees[$arr[0]]['Age'] = $arr[1];
		return $employees;
	}else {
		 $employees[$arr[0]]['Position'] = $arr[1];
		return $employees;
	}
}

$mode = 'reg';
$employees = [];

while (1){
	$input = trim(fgets(STDIN));

	if($input =='filter base'){
		$mode = 'print';
	   continue;
	}
	if($mode == 'reg'){
		$arr = explode(' -> ',$input);
		$employees = regEmpl($employees,$arr);
		
	}elseif ($mode == 'print'){
	    if(isset($input)){
	   	foreach ($employees as $key=>$value){
		    foreach ($value as $cmd => $item){
			    if($cmd == $input) {
				    echo "Name: $key \n";
				    echo "$input: $item \n";
				    echo str_repeat( '=', 20 );
				    echo "\n";
			    }
		    }
	    }
	   }
	   exit;
	}
}