<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 22:44
 */

class Tire {
	public $pressure;
	public $age;

	public function __construct(float $pressure,int $age) {
		$this->pressure = $pressure;
		$this->age = $age;
	}
}