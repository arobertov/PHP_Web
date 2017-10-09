<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 9.10.2017 г.
 * Time: 21:01
 */

abstract class Vehicle
{
   protected $fuel;
   protected $fpKm;
   protected $travelled;

   abstract function setFuel($fuel);
   abstract function  getFuel();

   abstract function setFpKm ($fpKm);
   abstract function getFpKm ();

   abstract function setTravelled ($travelled);
   abstract function getTravelled ();
}