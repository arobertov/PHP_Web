<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 16.10.2017 г.
 * Time: 5:47
 */
include ('Buyer.php');
class Rebel implements Buyer {
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
	private $group;

	/**
	 * @var int
	 */
	private $food = 0;

	/**
	 * Rebel constructor.
	 *
	 * @param string $name
	 * @param string $age
	 * @param string $group
	 */
	public function __construct( $name, $age, $group ) {
		$this->setName($name);
		$this->setAge($age);
		$this->setGroup($group);
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
	public function getGroup(): string {
		return $this->group;
	}

	/**
	 * @param string $group
	 */
	public function setGroup( string $group ) {
		$this->group = $group;
	}

	/**
	 * @return int
	 */
	public function getFood(): int {
		return $this->food;
	}

	/**
	 * @param int $food
	 */
	public function setFood( int $food ) {
		$this->food = $food;
	}

	public function buyFood() {
		$this->setFood($this->getFood()+5);
	}


}