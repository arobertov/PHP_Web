<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 16.10.2017 г.
 * Time: 6:52
 */
 include ('Angel.php');
 include ('Hashing.php');
class Archangel extends Angel implements Hashing {
	public function hashName() {
		$strrev = strrev($this->getUsername());
		$strcount = (strlen($this->getUsername())*21);
		$this->setHashedPassword($strrev.' '.$strcount);
	}
	 public function __construct(string $username,string $type,float $specialPoints,int $level ) {
		 parent::__construct( $username,$type, $specialPoints, $level );
		 $this->hashName();
	 }
}