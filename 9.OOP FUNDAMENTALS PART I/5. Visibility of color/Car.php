<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 13:24
 */
 include ('Vehicle.php');

class Car extends Vehicle {
	private $brand;
	private $model;
	private $year;

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

	public function paint($paint_color){
		parent::setColor($paint_color);
}



	public function __construct($numberDoors,$color,$brand,$model,$year) {
		parent::__construct($numberDoors,$color);
		$this->setBrand($brand);
		$this->setModel($model);
		$this->setYear($year);
	}

}