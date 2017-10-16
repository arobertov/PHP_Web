<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 16.10.2017 г.
 * Time: 6:39
 */

abstract class Angel {
	protected $username;
	protected $type;
	protected $hashedPassword;
	protected $level;
	protected $specialPoints;

	/**
	 * Angel constructor.
	 *
	 * @param $username
	 * @param $level
	 * @param $specialPoints
	 */
	public function __construct(string $username,string $type,float $specialPoints,int $level  ) {
		$this->setUsername($username);
		$this->setType($type);
		$this->setSpecialPoints($specialPoints);
		$this->setLevel($level);
	}

	public function __toString() {
		return '"'.$this->getUsername().'" | "'.$this->getHashedPassword().'" -> '. $this->getType().' '.PHP_EOL.
		       number_format($this->getSpecialPoints()*$this->getLevel(),1,'.','');

	}

	/**
	 * @return mixed
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param mixed $type
	 */
	public function setType( $type ) {
		$this->type = $type;
	}

	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}

	/**
	 * @param mixed $username
	 */
	public function setUsername( $username ) {
		$this->username = $username;
	}

	/**
	 * @return mixed
	 */
	public function getHashedPassword() {
		return $this->hashedPassword;
	}

	/**
	 * @param mixed $hashedPassword
	 */
	public function setHashedPassword( $hashedPassword ) {
		$this->hashedPassword = $hashedPassword;
	}

	/**
	 * @return mixed
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * @param mixed $level
	 */
	public function setLevel( $level ) {
		$this->level = $level;
	}

	/**
	 * @return mixed
	 */
	public function getSpecialPoints() {
		return $this->specialPoints;
	}

	/**
	 * @param mixed $specialPoints
	 */
	public function setSpecialPoints( $specialPoints ) {
		$this->specialPoints = $specialPoints;
	}


}