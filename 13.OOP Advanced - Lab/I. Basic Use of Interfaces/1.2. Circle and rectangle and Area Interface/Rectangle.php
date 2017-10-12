<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 21:53
 */
declare(strict_types=1);
include ('../Area.php');
class Rectangle implements Area {
	/**
	 * @var float
	 */
	private $width;

	/**
	 * @var float
	 */
	private $height;

	/**
	 * Rectangle constructor.
	 *
	 * @param float $width
	 * @param float $height
	 */
	public function __construct(float $width,float $height ) {
		$this->setWidth($width);
		$this->setHeight($height);
	}

	/**
	 * @return float
	 */
	public function getWidth(): float {
		return $this->width;
	}

	/**
	 * @param float $width
	 */
	public function setWidth( float $width ) {
		$this->width = $width;
	}

	/**
	 * @return float
	 */
	public function getHeight(): float {
		return $this->height;
	}

	/**
	 * @param float $height
	 */
	public function setHeight( float $height ) {
		$this->height = $height;
	}



	public function getSurface() {
		return $this->getWidth()*$this->getHeight();
	}

	public function __toString() {
		return "Rectangle, width = {$this->getWidth()} mm, height = {$this->getHeight() } mm, area = {$this->getSurface()} mm^2";
	}
}