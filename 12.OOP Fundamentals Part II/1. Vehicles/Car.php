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
		$this->fuel = $fuel;
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
	public function getTravelled() {
		return $this->travelled;
	}

	/**
	 * @param mixed $travelled
	 */
	public function setTravelled( $travelled ) {
		$this->travelled = $travelled;
	}

	

    public function vehicleDrive( $quantity, $vehicle){
        if(($quantity*$this->getFpKm()) < $this->getFuel()){
            $this->setFuel($this->getFuel() - ($quantity*$this->getFpKm()));
            $this->setTravelled($quantity);
	        echo "$vehicle travelled $quantity km \n";
        } else {
	        echo "$vehicle needs refueling \n";
        }
    }

    public function vehicleRefuel( $quantity ){
	    $this->setFuel($this->getFuel() + $quantity);
    }

	public function __toString()
    {
        return "Car: " . round($this->getFuel(),2) . "\n";
    }
}