<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 15.10.2017 г.
 * Time: 16:51
 */
 include ('Data.php');
class Robot implements Data {
	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $id;

	/**
	 * Robot constructor.
	 *
	 * @param string $name
	 * @param string $id
	 */
	public function __construct(string $name,string $id ) {
		$this->setName($name);
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