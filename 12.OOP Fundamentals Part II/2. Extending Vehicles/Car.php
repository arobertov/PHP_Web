<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 9.10.2017 г.
 * Time: 21:08
 */
include ('Vehicle.php');

class Car extends Vehicle
{
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
		$this->fpKm = $fpKm + 0.9;
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
        return "Car: " . round($this->getFuel(),2) . "\n";
    }
}