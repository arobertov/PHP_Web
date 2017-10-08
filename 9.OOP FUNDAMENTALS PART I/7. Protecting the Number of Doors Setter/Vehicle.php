<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 12:43
 */

class Vehicle {
	protected $numberDoors;
	protected $color;

	/**
	 * @return mixed
	 */
	public function getNumberDoors() {
		return $this->numberDoors;
	}

	/**
	 * @param mixed $numberDoors
	 */
	public function setNumberDoors( $numberDoors ) {
		$this->numberDoors = $numberDoors;
	}

	/**
	 * @return mixed
	 */
	public function getColor() {
		return $this->color;
	}

	/**
	 * @param mixed $color
	 */
	public function setColor( $color ) {
		$this->color = $color;
	}

	public function paintVehicle($newColor){
		$this->color = $newColor;
	}



	public function __construct($numberDoors, $color) {
		$this->setNumberDoors($numberDoors);
		$this->setColor($color);
	}

	public function __get( $name ) {
		if($this->{$name}){
			return $this->{$name};
		} else {
			return 'property doesn’t exist !';
		}
	}
}