<?php
include ('Ferari.php');
while (1) {
	$input   = trim( fgets( STDIN ) );
	if($input == "END"){
		break;
	}
	$ferrari = new Ferrari( $input );
	Ferrari::$objNum +=1;
	echo $ferrari;
}