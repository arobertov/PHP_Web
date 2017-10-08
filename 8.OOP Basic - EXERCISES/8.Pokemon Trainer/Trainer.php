<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 3.10.2017 г.
 * Time: 18:25
 */

class Trainer {
	private $name;
	private $badgeNums;
	private $pokemonColl;

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
	public function getBadgeNums() {
		return $this->badgeNums;
	}

	/**
	 * @param mixed $badgeNums
	 */
	public function setBadgeNums( $badgeNums ) {
		$this->badgeNums = $badgeNums;
	}

	/**
	 * @return array
	 */
	public function getPokemonColl() {
		return $this->pokemonColl;
	}

	/**
	 * @param array $pokemonColl
	 */
	public function setPokemonColl( $pokemonColl ) {
		$this->pokemonColl = $pokemonColl;
	}
	


	public function __construct( string $name , int $badgeNums = 0 , array $pokemonColl) {
		$this->name = $name;
		$this->badgeNums = $badgeNums;
		$this->pokemonColl = $pokemonColl;
	}

}