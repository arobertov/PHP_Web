<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 30.9.2017 г.
 * Time: 17:57
 */
class Car {
	private $brand;
	private $model;
	private $year;
	private $carParam;


	public function getBrand() {
		return $this->brand;
	}


	public function getModel() {
		return $this->model;
	}

	function setYear($year) {
		if(!is_numeric($year)){
			return;
		}
		$this->year = $year;
	}

	public function getYear() {
		return $this->year;
	}


	function __construct($brand,$model,$engine,$numSeats,$hp) {
		$this->brand = $brand;
		$this->model = $model;
		$this->carParam = new CarParam($engine,$numSeats,$hp);
	}
}

class CarParam {
	public  $engine;
	public  $numSeats;
	public	$hp;

	function __construct($engine,$numSeats,$hp) {
		$this->engine = $engine;
		$this->numSeats = $numSeats;
		$this->hp = $hp;
	}

}


	$input = 'Audi 100 1994 Diesel 4+1 125hp';
	$car   = explode( ' ', $input );

	$brand = $car[0];
	$model = $car[1];
	$year  = intval( $car[2] );
	$engine = $car[3];
	$numSeats = $car[4];
	$hp = $car[5];

	$cars = new Car( $brand, $model,$engine,$numSeats,$hp );
	$cars->setYear( $year );



print_r($cars);

