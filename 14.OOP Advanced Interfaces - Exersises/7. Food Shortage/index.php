<?php
include ('Citizen.php');

$arr = [];
$count = trim(fgets(STDIN));
for($i=0;$i<$count;$i++) {
	$input = explode(' ',trim(fgets(STDIN)));


	if(count($input) == 4) {
		list( $name, $age, $id, $birthDate ) = $input;
		$citizen = new Citizen( $name, $age, $id, $birthDate );
		$citizen->buyFood();
		$arr[] = $citizen;
	}elseif (count($input) == 3){
		list($name,$age,$group) = $input;
		$rebel = new Rebel($name,$age,$group);
		$rebel->buyFood();
		$arr[] = $rebel;
	}
}
while (1) {
	$invalid = trim( fgets( STDIN ) );
	if ( $invalid == 'End' ) {
		break;
	}
}
$foodAmount = 0;
foreach ($arr as $obj){
	 $foodAmount += $obj->getFood();
}
echo $foodAmount;

