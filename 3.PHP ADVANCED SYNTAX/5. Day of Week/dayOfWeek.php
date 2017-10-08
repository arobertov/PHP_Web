<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 12:03
 */
//declare function
function dayOfWeek($day) {
	switch ($day){
		case 'Monday':
			return 1;
		case'Tuesday':
			return 2;
		case 'Wednesday':
			return 3;
		case 'Thursday':
			return 4;
		case 'Friday':
			return 5;
		case 'Saturday':
			return 6;
		case 'Sunday':
			return 7;
		default :
			return 'error';
	}
}
//function execute
//exit of the script insert " exit "
$day = '';
while($day != 'exit') {

	$day = trim( fgets( STDIN ) );
	if($day=='exit')return;
	echo dayOfWeek( $day )."\n" ;
} ;