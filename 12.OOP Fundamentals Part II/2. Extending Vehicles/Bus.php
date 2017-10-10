<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 10.10.2017 г.
 * Time: 9:14
 */

class Bus extends Vehicle {
	/**
	 * @return mixed
	 */
	public function getFuel() {
		return $this->fuel;
	}

	/**
	 * @param mixed $fuel
	 */
	public function setFuel( $fuel ) {
		parent::setFuel($fuel);
	}

	/**
	 * @return mixed
	 */
	public function getFpKm() {
		return $this->fpKm;
	}

	/**
	 * @param mixed $fpKm
	 */
	public function setFpKm( $fpKm ) {
		$this->fpKm = $fpKm ;
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
	public function fullVehicleDrive($quantity, $vehicle){

	}

	public function vehicleDrive( $quantity, $vehicle){
		if(($quantity*$this->getFpKm()) < $this->getFuel()){
			$this->setFuel($this->getFuel() - ($quantity*$this->getFpKm()));
			echo "$vehicle travelled $quantity km \n";
		} else {
			echo "$vehicle needs refueling \n";
		}
	}

	public function __toString()
	{
		return "Bus: " . round($this->getFuel(),2) . "\n";
	}
}