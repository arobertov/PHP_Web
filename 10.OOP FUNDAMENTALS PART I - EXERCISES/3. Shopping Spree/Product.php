<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 19:10
 */

class Product {
	private $name;
	private $cost;

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getCost() {
		return $this->cost;
	}

	/**
	 * @param mixed $cost
	 */
	public function setCost( $cost ) {
		if($cost>=0) {
			$this->cost = $cost;
		} else {
			die( "Cost cannot be negative \n" );
		}
	}

	public function __construct($name,$cost) {
		$this->setName($name);
		$this->setCost($cost);
	}

}