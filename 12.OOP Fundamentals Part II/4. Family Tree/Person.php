<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 10.10.2017 г.
 * Time: 19:58
 */

abstract class Person {
	     protected $name;
	     protected $yearBirth;
	     protected $yearDead;

	/**
	 * Person constructor.
	 *
	 * @param $name
	 * @param $yearBirth
	 * @param $yearDead
	 */
	public function __construct(string $name,int $yearBirth,int $yearDead ) {
		$this->setName($name);
		$this->setYearBirth($yearBirth);
		$this->setYearDead($yearDead);
	}

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
		if(strlen($name>3)){
			die('Name must three and more letters');
		}
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getYearBirth() {
		return $this->yearBirth;
	}

	/**
	 * @param mixed $yearBirth
	 */
	public function setYearBirth( $yearBirth ) {
		$this->yearBirth = $yearBirth;
	}

	/**
	 * @return mixed
	 */
	public function getYearDead() {
		return $this->yearDead;
	}

	/**
	 * @param mixed $yearDead
	 */
	public function setYearDead( $yearDead ) {
		$this->yearDead = $yearDead;
	}



	abstract function getTimeLived();
	abstract function getGenerationNum();


}