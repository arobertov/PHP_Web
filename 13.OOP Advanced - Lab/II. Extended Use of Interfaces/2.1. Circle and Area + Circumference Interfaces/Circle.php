<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 22:16
 */
declare(strict_types = 1);
include ('../Circumference.php');
include ('../Area.php');
class Circle  implements Area ,Circumference {
	/**
	 * @var float
	 */
	private $radius;
	const PI = 3.14;

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

	public function getCircumference() {
		return 2*self::getRadius()*self::PI;
	}

	public function __toString() {
		return "Circle, radius = {$this->getRadius()} mm, area = {$this->getSurface()} mm^2 
Circumference = {$this->getCircumference()} mm";
	}

}