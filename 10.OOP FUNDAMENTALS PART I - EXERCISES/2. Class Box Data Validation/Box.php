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
		if( $length > 0 ) {
			$this->length = $length;
		} else {
			die( "Length cannot be zero or negative ! \n");
			}
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
		if( $width > 0 ) {
			$this->width = $width;
		} else {
			die("Width cannot be zero or negative ! \n");
		}
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
		if( $height > 0 ) {
			$this->height = $height;
		} else {
			die("Height cannot be zero or negative ! \n");

		}
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