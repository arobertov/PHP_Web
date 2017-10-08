<?php
include ('Cars.php');
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 17:29
 */

$count = trim(fgets(STDIN));
$carList = [];
for($i=0;$i<$count;$i++){
	$input = explode(' ',trim(fgets(STDIN)) );
	$car = new Car($input);
	$carList[] = $car;
}

while (1){
	$input2 = trim(fgets(STDIN));
	if($input2 == 'End'){
		break;
	}

	$drive = explode(' ',$input2);
	$model = $drive[1];
	$distance = $drive[2];
	foreach ($carList as $value) {
		if($value->model == $model ){
			if(($value->fuelCostForKm * $distance)> $value->fuelAmount) {
				echo "Insufficient fuel for the drive \n";
			} else {
				$value->fuelAmount -= ($value->fuelCostForKm * $distance);
				$value->distance += $distance;
			}
		}
	}
}

foreach ( $carList as $item ) {
	echo $item->model.' '.number_format($item->fuelAmount,2,'.',',').' '.$item->distance."\n";
}