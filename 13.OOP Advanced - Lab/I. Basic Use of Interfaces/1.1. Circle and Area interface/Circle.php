<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 21:26
 */
  declare(strict_types = 1);
  include ('../Area.php');
class Circle implements Area {
	/**
	 * @var float
	 */
	private $radius;
	const PI = 3.14;
	 function lele(){

	 }
	/**
	 * Circle constructor.
	 *
	 * @param float $radius
	 */
	public function __construct(float $radius ) {
		$this->setRadius($radius);
	}

	/**
	 * @return float
	 */
	public function getRadius(): float {
		return $this->radius;
	}

	/**
	 * @param float $radius
	 */
	public function setRadius( float $radius ) {
		$this->radius = $radius;
	}



	public function getSurface() {
		return self::PI*self::getRadius()*self::getRadius();
	}

	public function __toString() {
		return "Circle, radius = {$this->getRadius()} mm, area = {$this->getSurface()} mm^2";
	}
}