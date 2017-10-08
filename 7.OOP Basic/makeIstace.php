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
	}
}
$carList = [];
  for($i=0;$i<4;$i++) {
	  $input = trim( fgets( STDIN ) );
	  $car   = explode( ' ', $input );

	  $brand = $car[0];
	  $model = $car[1];
	  $year  = intval( $car[2] );

	  $cars = new Car( $brand, $model );
	  $cars->setYear( $year );
	  $carList[]=$cars;
  }

asort($carList);
  print_r($carList);


foreach ($carList as $value){
	echo $value->getBrand().','.$value->getModel().','.$value->getYear()."\n";
}


