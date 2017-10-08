<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 13:45
 */
include ('Human.php');
  $i=0;
while ($i<2){
	$i++;
	try {
		$input = explode( ' ', trim( fgets( STDIN ) ) );
		if ( count( $input ) == 3 ) {
			$student = new Student( $input[0], $input[1], $input[2] );
			echo $student;
		} elseif ( count( $input ) == 4 ) {
			$worker = new Worker( $input[0], $input[1], $input[2], $input[3] );
			echo $worker;
		}
	} catch (Exception $e ){
		echo $e->getMessage()."\n";
	}
}

