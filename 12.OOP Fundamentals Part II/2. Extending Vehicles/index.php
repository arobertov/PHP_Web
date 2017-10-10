<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 9.10.2017 г.
 * Time: 20:53
 */
include ('Car.php');
include ('Truck.php');
include ('Bus.php');

$inputCar = explode(' ',trim(fgets(STDIN)));
$inputTruck = explode(' ',trim(fgets(STDIN)));
$inputBus = explode(' ',trim(fgets(STDIN)));

list($vehicle,$fuel,$fpKm,$tankCapacity) = $inputCar;
$car = new Car($fuel,$fpKm,$tankCapacity);

list($vehicle,$fuel,$fpKm,$tankCapacity) = $inputTruck;
$truck = new Truck($fuel,$fpKm,$tankCapacity);

list($vehicle,$fuel,$fpKm,$tankCapacity) = $inputBus;
$bus = new Bus($fuel,$fpKm,$tankCapacity);

 print_r($car);
 print_r($truck);
$counter = trim(fgets(STDIN));
for($i=0;$i<$counter;$i++){
    $command = explode(' ',trim(fgets(STDIN)));
    list($cmd,$vehicle,$quantity) = $command;
    if($cmd == 'Drive') {
	    switch ( $vehicle ) {
		    case 'Car':
			    $car->vehicleDrive( $quantity, $vehicle );
			    break;
		    case 'Truck':
			    $truck->vehicleDrive( $quantity, $vehicle );
			    break;
		    case 'Bus':
		    	$bus->setFuel($bus->getFuel()+($quantity * 1.4));
			    $bus->vehicleDrive( $quantity, $vehicle );
			    break;
	    }
    }elseif ($cmd == 'DriveEmpty'&& $vehicle == 'Bus'){
	            $bus->vehicleDrive( $quantity, $vehicle );
    }elseif ($cmd == 'Refuel'){
    	if($quantity <= 0){
    		echo "Fuel must be a positive number.\n";
    		continue;
	    }
        switch ($vehicle){
            case'Car':
            	$car->vehicleRefuel($quantity);
                break;
            case'Truck':
                $truck->vehicleRefuel(($quantity));
                break;
	        case'Bus':
	        	$bus->vehicleRefuel($quantity);
        }
    }
}

echo $car;
echo $truck;
echo $bus;
