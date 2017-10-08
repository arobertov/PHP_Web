<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 13:21
 */
include ('Car.php');

$car = new Car('4','grey','Audi','100','1993');

$car->paint('Red');
$car->setNumberDoors('5+1');

// this unable work ,property color is protected
//  $car->color = 'Black';
print_r($car);