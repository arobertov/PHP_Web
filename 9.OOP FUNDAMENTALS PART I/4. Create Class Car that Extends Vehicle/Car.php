<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 13:24
 */
 include ('Vehicle.php');
class Car extends Vehicle {
	public $brand;
	public $model;
	public $year;

	public function __construct($numberDoors,$color,$brand,$model,$year) {
		parent::__construct($numberDoors,$color);
		$this->brand = $brand;
		$this->model = $model;
		$this->year = $year;
	}

}