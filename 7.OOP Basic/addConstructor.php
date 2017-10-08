<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 30.9.2017 г.
 * Time: 17:57
 */
class Car {
	public $brand;
	public $model;
	public $year;

	function __construct($brand,$model,$year) {
		$this->brand = $brand;
		$this->model = $model;
		$this->year = $year;
		//optional add current  timestamp
		$this->dateTime = new DateTime('now',new DateTimeZone('Europe/Sofia'));
	}
}

$car1= new Car('Audi','100',1992);

$car2 = new Car('Mercedes','500SL',1995);

$car3 = new Car('WW','Passat',2001);

var_dump($car1,$car2,$car3);