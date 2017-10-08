<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 12:46
 */
include ('Vehicle.php');
$vehicle = new Vehicle('2','orange');
//paint vehicle
$vehicle->paintVehicle('blue');
print_r($vehicle);