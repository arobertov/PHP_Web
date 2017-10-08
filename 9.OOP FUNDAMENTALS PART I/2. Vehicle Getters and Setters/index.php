<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 12:46
 */
include ('Vehicle.php');
$vehicle = new Vehicle('4','orange');
echo "Get numbers of doors : \n". $vehicle->__get('numberDoors')."\n" ;
