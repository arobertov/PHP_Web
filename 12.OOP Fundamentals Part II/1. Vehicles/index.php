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
$inputCar = explode(' ',readline());
$inputTruck = explode(' ',readline());

list($vehicle,$fuel,$fpKm) = $inputCar;
$car = new Car($fuel,$fpKm,$distance);

list($vehicle,$fuel,$fpKm) = $inputTruck;
$truck = new Truck($fuel,$fpKm,$distance);

$counter = readline();
for($i=0;$i<$counter;$i++){
    $command = explode(' ',readline());
    list($cmd,$vehicle,$quantity) = $command;
    if($cmd == 'Drive'){
        switch ($vehicle){
            case 'Car':
                if($car->checkOperation($quantity)) {
                    echo "Car travelled $quantity km \n";
                } else {
                    echo "Car needs refueling \n";
                }
                break;
            case 'Truck':
                if($truck->checkOperation($quantity)){
                    echo "Truck travelled $quantity km \n";
                } else {echo "Truck needs refueling \n";}
                break;
        }

    }elseif ($cmd == 'Refuel'){
        switch ($vehicle){
            case'Car':
                $car->setFuel($car->getFuel() + $quantity);
                break;
            case'Truck':
                $truck->setFuel($truck->getFuel() + ($quantity*0.95));
                break;
        }
    }
}

echo $car;
echo $truck;
