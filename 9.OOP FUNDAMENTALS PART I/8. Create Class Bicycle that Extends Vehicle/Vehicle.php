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
	private $brand;
	private $model;
	private $year;

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

	/**
	 * @return mixed
	 */
	public function getBrand() {
		return $this->brand;
	}

	/**
	 * @param mixed $brand
	 */
	public function setBrand( $brand ) {
		$this->brand = $brand;
	}

	/**
	 * @return mixed
	 */
	public function getModel() {
		return $this->model;
	}

	/**
	 * @param mixed $model
	 */
	public function setModel( $model ) {
		$this->model = $model;
	}

	/**
	 * @return mixed
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * @param mixed $year
	 */
	public function setYear( $year ) {
		$this->year = $year;
	}



	public function paintVehicle($newColor){
		$this->color = $newColor;
	}



	public function __construct($numberDoors, $color, $brand, $model ,$year) {
		$this->setNumberDoors($numberDoors);
		$this->setColor($color);
	}
	
}