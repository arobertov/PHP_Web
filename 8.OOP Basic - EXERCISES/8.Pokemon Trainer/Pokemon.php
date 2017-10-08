<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 3.10.2017 г.
 * Time: 18:27
 */

class Pokemon {
   private $pkName;
   private $pkElement;
   private  $pkHealth;

	/**
	 * @return mixed
	 */
	public function getPkName() {
		return $this->pkName;
	}

	/**
	 * @return mixed
	 */
	public function getPkElement() {
		return $this->pkElement;
	}

	/**
	 * @return mixed
	 */
	public function getPkHealth() {
		return $this->pkHealth;
	}



   public function __construct( string $pkName , string $pkElement , int $pkHealth) {
	   $this->pkName = $pkName;
	   $this->pkElement = $pkElement;
	   $this->pkHealth = $pkHealth;
   }
}