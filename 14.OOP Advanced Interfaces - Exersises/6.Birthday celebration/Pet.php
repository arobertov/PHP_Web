<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 15.10.2017 г.
 * Time: 18:12
 */
include ('Citizen.php');
class Pet implements BirthData {
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $birthDate;

	/**
	 * Pet constructor.
	 *
	 * @param string $name
	 * @param string $birthDate
	 */
	public function __construct(string $name,string $birthDate ) {
		$this->setName($name);
		$this->setBirthDate($birthDate);
	}


	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName( string $name ) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getBirthDate(): string {
		return $this->birthDate;
	}

	/**
	 * @param string $birthDate
	 */
	public function setBirthDate( string $birthDate ) {
		$this->birthDate = $birthDate;
	}




	public function findBirthDateYear( $findBDY ) {
		if(strpos($this->getBirthDate(),$findBDY)){
			return $this->getBirthDate();
		}else {
			return false;
		}
	}


}