<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 14.10.2017 г.
 * Time: 11:59
 */
include ('Car.php');
class Ferrari {
	 /**
	  * @var bool
	  */
	 private $breaks = true;

	 /**
	  * @var bool
	  */
	 private $gazPedal = true;

	/**
	 * @var string
	 */
	private $driverName ;

	/**
	 * @var string
	 */
	private $carModel = '488-Spider';

	/**
	 * @var int
	 */
	public static $objNum;

	public function __construct(string $driverName ) {
		$this->setDriverName($driverName);
	}

	/**
	 * @return string
	 */
	public function getDriverName(): string {
		return $this->driverName;
	}

	/**
	 * @param string $driverName
	 */
	public function setDriverName( string $driverName ) {
		$this->driverName = $driverName;
	}

	/**
	 * @return string
	 */
	public function getCarModel(): string {
		return $this->carModel;
	}

	/**
	 * @param string $carModel
	 */
	public function setCarModel( string $carModel ) {
		$this->carModel = $carModel;
	}

	
	public function isBreaks() {
		return 'Brakes';
	}


	public function setBreaks( bool $breaks ) {
		$this->breaks = $breaks;
	}


	public function isGazPedal(){
		return 'Zadu6avam Sa';
	}


	public function setGazPedal( bool $gazPedal ) {
		$this->gazPedal = $gazPedal;
	}

	static function forUrl($input){
		$urlName = strtolower($input);
		$urlName = str_replace(' ','-',$urlName);
		return $urlName;
	}

	public function __toString() {
		return "{$this->getCarModel()}/{$this->isBreaks()}!/{$this->isGazPedal()}!/".self::forUrl($this->getDriverName())."/inst. ".self::$objNum."\n";
	}
}