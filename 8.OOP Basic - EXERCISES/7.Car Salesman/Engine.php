<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 3.10.2017 г.
 * Time: 14:53
 */

class Engine {
	private $model;
	private $power;
	private $displacement= 'n/a';
	private $efficiency = 'n/a';

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
	public function getPower() {
		return $this->power;
	}

	/**
	 * @param mixed $power
	 */
	public function setPower( $power ) {
		$this->power = $power;
	}

	/**
	 * @return string
	 */
	public function getDisplacement(): string {
		return $this->displacement;
	}

	/**
	 * @param string $displacement
	 */
	public function setDisplacement( string $displacement ) {
		$this->displacement = $displacement;
	}

	/**
	 * @return string
	 */
	public function getEfficiency(): string {
		return $this->efficiency;
	}

	/**
	 * @param string $efficiency
	 */
	public function setEfficiency( string $efficiency ) {
		$this->efficiency = $efficiency;
	}

	public function __construct( array $arr) {
		$this->model = $arr[0];
		$this->power = $arr[1];
		if(isset($arr[2])) {
		    $this->displacement = $arr[2];
		}
		if(isset($arr[3])) {
			$this->efficiency = $arr[3];
		}
	}
}
