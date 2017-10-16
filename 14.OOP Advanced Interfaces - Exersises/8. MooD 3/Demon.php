<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 16.10.2017 г.
 * Time: 7:01
 */
 include ('Archangel.php');
class Demon extends Angel implements Hashing {

	public function hashName() {
		$hashing = strlen($this->getUsername());
		$this->setHashedPassword($hashing*217);
	}

	public function __construct(string $username,string $type,float $specialPoints,int $level ) {
		parent::__construct( $username,$type, $specialPoints, $level );
		$this->hashName();
	}

}