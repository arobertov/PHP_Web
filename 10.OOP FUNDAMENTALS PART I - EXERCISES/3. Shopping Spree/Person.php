<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 19:10
 */

class Person {
  private $name;
  private $money;
  private $bagOfProducts;

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName( $name ) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getMoney() {
		return $this->money;
	}

	/**
	 * @param mixed $money
	 */
	public function setMoney( $money ) {
		if($money>=0){
			$this->money = $money;
		}
		else {
			die( "Money cannot be negative \n" );

		}

	}

	/**
	 * @return mixed
	 */
	public function getBagOfProducts() {
		return $this->bagOfProducts;
	}

	/**
	 * @param mixed $bagOfProducts
	 */
	public function setBagOfProducts( $bagOfProducts ) {
		$this->bagOfProducts = $bagOfProducts;
	}

  public function __construct($name,$money) {
      $this->setName($name);
      $this->setMoney($money);
  }
}