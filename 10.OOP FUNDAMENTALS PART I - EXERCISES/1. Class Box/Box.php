<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 15:46
 */

class Box {
	private $length;
	private $width;
	private $height;

	/**
	 * @return float
	 */
	public function getLength() {
		return $this->length;
	}

	/**
	 * @param float $length
	 */
	public function setLength( $length ) {
		$this->length = $length;
	}

	/**
	 * @return float
	 */
	public function getWidth() {
		return $this->width;
	}

	/**
	 * @param float $width
	 */
	public function setWidth( $width ) {
		$this->width = $width;
	}

	/**
	 * @return float
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * @param mixed $height
	 */
	public function setHeight( $height ) {
		$this->height = $height;
	}

	public function surArea(){
		return round((2*$this->getLength()*$this->getWidth()) + (2*$this->getLength()*$this->getHeight()) +
		       (2*$this->getWidth()*$this->getHeight()),2);
	}

	public function latSurArea (){
		return round((2*$this->getLength()*$this->getHeight()) + (2*$this->getWidth()*$this->getHeight()),2);
	}

	public  function volume(){
		return round(($this->getLength()*$this->getWidth()*$this->getHeight()),2);
	}

	public function __construct(float $l , float $w , float $h) {
		$this->setLength($l);
		$this->setWidth($w);
		$this->setHeight($h);
	}

}