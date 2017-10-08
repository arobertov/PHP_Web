<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 14:03
 */

include ('Vehicle.php');

class Bicycle extends Vehicle {
	private $brand;
	private $model;
	private $year;
	private $ride;
	private $stop;
	private $forSkirt;

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

	/**
	 * @return mixed
	 */
	public function getRide() {
		return $this->ride;
	}

	/**
	 * @param mixed $ride
	 */
	public function setRide( $ride ) {
		$this->ride = $ride;
	}

	/**
	 * @return mixed
	 */
	public function getStop() {
		return $this->stop;
	}

	/**
	 * @param mixed $stop
	 */
	public function setStop( $stop ) {
		$this->stop = $stop;
	}

	/**
	 * @return mixed
	 */
	public function getForSkirt() {
		return $this->forSkirt;
	}

	/**
	 * @param mixed $forSkirt
	 */
	public function setForSkirt( $forSkirt ) {
		$this->forSkirt = $forSkirt;
	}

	public function ride($ride){
		$this->setRide($ride);
		if($ride){
			return 'Yes';
		} else {
			return 'No';
		}
	}

	public function stop($stop){
		$this->setStop($stop);
		if($stop == 'STOP'){
			return 'Yes';
		} else {
			return 'No';
		}
	}

	public function __construct( $numberDoors = 0 , $color , $brand , $model , $year ,$forSkirt ) {
		parent::__construct($numberDoors,$color);
		$this->setBrand($brand);
		$this->setModel($model);
		$this->setYear($year);
		$this->setForSkirt($forSkirt);
	}

	public function __toString() {
		return
		"<tr>
		<td>$this->model</td>
	    <td>$this->brand</td>
	    <td>$this->year</td>
	    <td>$this->forSkirt</td>
	    <td>$this->ride</td>
	    <td>$this->stop</td>
	    </tr>";
	}
}