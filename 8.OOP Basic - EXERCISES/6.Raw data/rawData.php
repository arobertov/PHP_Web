<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 21:16
 */
include ('Car.php');
include ('Engine.php');
include ('Cargo.php');
include ('Tire.php');

$countCars = trim(fgets(STDIN));
$cars = [];
for($i=0;$i<$countCars;$i++){
	$carInfo = explode(' ',trim(fgets(STDIN)));
	list($model,$engineSpeed,$enginePower,$cargoWeight,
	$cargoType,$tire1Pressure,$tire1Age,$tire2Pressure,
	$tire2Age,$tire3Pressure,$tire3Age,$tire4Pressure,$tire4Age)=$carInfo;

	$engine = new Engine(intval($engineSpeed),intval($enginePower));
	$cargo = new Cargo(intval($cargoWeight),$cargoType);

	$tire1 = new Tire(floatval($tire1Pressure),intval($tire1Age));
	$tire2 = new Tire(floatval($tire2Pressure),intval($tire2Age));
	$tire3 = new Tire(floatval($tire3Pressure),intval($tire3Age));
	$tire4 = new Tire(floatval($tire4Pressure),intval($tire4Age));

	$tires = [$tire1,$tire2,$tire3,$tire4];

	$cars[] = new Car($model,$engine,$cargo,$tires);
}
$command = trim(fgets(STDIN));
if($command == 'Fragile'){
	foreach ($cars as $car){
		if ($car->cargo->type == 'fragile'){
			foreach($car->tires as $tire){
				if($tire->pressure<1){
					echo $car->model."\n";
					break;
				}
			}
		}
	}
} elseif($command == 'Flamable') {
	foreach ($cars as $car){
		if ($car->cargo->type == 'flamable' && $car->engine->power > 250){
			echo $car->model."\n";
		}
	}
}