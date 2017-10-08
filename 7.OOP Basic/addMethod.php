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


	function __construct($brand,$model) {
		$this->brand = $brand;
		$this->model = $model;
		//optional add current  timestamp
		$this->dateTime = new DateTime('now',new DateTimeZone('Europe/Sofia'));
	}
}

$car1= new Car('Audi','100');
$car1->setYear(1992);

$car2 = new Car('Mercedes','500SL');
$car2->setYear(1995);

$car3 = new Car('WW','Passat');
$car3->setYear(2012);

var_dump($car1,$car2,$car3);