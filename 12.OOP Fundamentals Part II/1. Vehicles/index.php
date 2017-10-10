<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 9.10.2017 г.
 * Time: 20:53
 */
include ('Car.php');
include ('Truck.php');
$distance = 0;
$inputCar = explode(' ',trim(fgets(STDIN)));
$inputTruck = explode(' ',trim(fgets(STDIN)));

list($vehicle,$fuel,$fpKm) = $inputCar;
$car = new Car($fuel,$fpKm,$distance);

list($vehicle,$fuel,$fpKm) = $inputTruck;
$truck = new Truck($fuel,$fpKm,$distance);
 print_r($car);
 print_r($truck);
$counter = trim(fgets(STDIN));
for($i=0;$i<$counter;$i++){
    $command = explode(' ',trim(fgets(STDIN)));
    list($cmd,$vehicle,$quantity) = $command;
    if($cmd == 'Drive'){
        switch ($vehicle){
            case 'Car':
                $car->vehicleDrive($quantity,$vehicle);
                break;
            case 'Truck':
                $truck->vehicleDrive($quantity,$vehicle);
                break;
        }

    }elseif ($cmd == 'Refuel'){
        switch ($vehicle){
            case'Car':
            	$car->vehicleRefuel($quantity);
                break;
            case'Truck':
                $truck->vehicleRefuel(($quantity * 0.95));
                break;
        }
    }
}

echo $car;
echo $truck;
