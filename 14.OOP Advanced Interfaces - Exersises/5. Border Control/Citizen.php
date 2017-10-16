<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 15.10.2017 г.
 * Time: 16:50
 */
include ('Robot.php');
class Citizen implements Data {
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
	 * Citizen constructor.
	 *
	 * @param string $name
	 * @param string $age
	 * @param string $id
	 */
	public function __construct(string $name,string $age,string $id ) {
		$this->setName($name);
		$this->setAge($age);
		$this->setId($id);
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

	public function findIds($ids) {
		if(strpos($this->getId(),$ids)){
			return $this->getId();
		}
		return false;
	}
}