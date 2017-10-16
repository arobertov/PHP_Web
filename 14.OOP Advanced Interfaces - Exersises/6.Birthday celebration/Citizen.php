<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 15.10.2017 г.
 * Time: 16:50
 */
include ('Robot.php');
class Citizen implements BirthData {
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $age;

	/**
	 * @var string
	 */
	private $id;

	/**
	 * @var string
	 */
	private $birthDate;

	/**
	 * Citizen constructor.
	 *
	 * @param string $name
	 * @param string $age
	 * @param string $id
	 * @param string $birthDate
	 */
	public function __construct(string $name,string $age,string $id,string $birthDate) {
		$this->setName($name);
		$this->setAge($age);
		$this->setId($id);
		$this->setBirthDate($birthDate);
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
	public function getAge(): string {
		return $this->age;
	}

	/**
	 * @param string $age
	 */
	public function setAge( string $age ) {
		$this->age = $age;
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @param string $id
	 */
	public function setId( string $id ) {
		$this->id = $id;
	}

	public function findBirthDateYear($findBDY) {
		if(strpos($this->getBirthDate(),$findBDY)){
			return $this->getBirthDate();
		}
		return false;
	}
}