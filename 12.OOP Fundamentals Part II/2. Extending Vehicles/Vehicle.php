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
   protected $tankCapacity;

	abstract function vehicleDrive($quantity,$vehicle);

	public function vehicleRefuel( $quantity ){
		if($this->getTankCapacity()<($this->getFuel() + $quantity)){
			echo "Cannot fit fuel in tank \n";
		} else {
			$this->setFuel( $this->getFuel() + $quantity );
		}
	}

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

	/**
	 * @return mixed
	 */
	public function getTankCapacity() {
		return $this->tankCapacity;
	}

	/**
	 * @param mixed $tankCapacity
	 */
	public function setTankCapacity( $tankCapacity ) {
		$this->tankCapacity = $tankCapacity;
	}


	public function __construct(float $fuel, float $fpKm, float $tankCapacity)
	{
		$this->setFuel($fuel);
		$this->setFpKm($fpKm);
		$this->setTankCapacity($tankCapacity);
	}
}