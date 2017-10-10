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

   abstract function vehicleDrive($quantity,$vehicle);
   abstract function vehicleRefuel($quantity);

	public function setFuel($fuel){
		$this->fuel = $fuel;
	}

	public function  getFuel(){
		return $this->fuel;
	}

	public function setFpKm ($fpKm){
		$this->fpKm = $fpKm;
	}

	public function getFpKm (){
		return $this->fpKm;
	}

	public function setTravelled ($travelled){
		$this->travelled += $travelled;
	}

	function getTravelled (){
		return $this->travelled;
	}

	public function __construct(float $fuel, float $fpKm,float $travelled)
	{
		$this->setFuel($fuel);
		$this->setFpKm($fpKm);
		$this->setTravelled($travelled);
	}
}