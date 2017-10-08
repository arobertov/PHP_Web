<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 3.10.2017 г.
 * Time: 14:50
 */

class Car {
   private $model;
   private $engine;
   private $weight = 'n/a';
   private $color = 'n/a';

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
	public function getEngine() {
		return $this->engine;
	}

	/**
	 * @param mixed $engine
	 */
	public function setEngine( $engine ) {
		$this->engine = $engine;
	}

	/**
	 * @return string
	 */
	public function getWeight(): string {
		return $this->weight;
	}

	/**
	 * @param string $weight
	 */
	public function setWeight( string $weight ) {
		$this->weight = $weight;
	}

	/**
	 * @return string
	 */
	public function getColor(): string {
		return $this->color;
	}

	/**
	 * @param string $color
	 */
	public function setColor( string $color ) {
		$this->color = $color;
	}

	public function __construct(array $arr,Engine $engine) {
		$this->model = $arr[0];
		$this->engine = $engine;
		if(isset($arr[2])) {
			$this->weight = $arr[2];
		}
		if(isset($arr[3])) {
			$this->color = $arr[3];
		}
	}
	public function __toString() {
	return	$this->getModel().": \n".
		$this->getEngine()->getModel().": \n".
		"    Power: ".$this->getEngine()->getPower() ." \n".
		"    Displasment: ".$this->getEngine()->getDisplacement()." \n".
		"    Efficiency: ".$this->getEngine()->getEfficiency()."\n".
		"Weight: ".$this->getWeight()."\n".
		"Color :".$this->getColor()."\n";
	}

}