<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 12:43
 */

class Vehicle {
	public $numberDoors;
	public $color;

	public function __construct($numberDoors, $color) {
	    $this->numberDoors = $numberDoors;
	    $this->color = $color;
	}
}