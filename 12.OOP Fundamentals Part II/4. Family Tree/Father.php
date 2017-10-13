<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 10.10.2017 г.
 * Time: 19:34
 */
include ('Person.php');

class Father extends Identifiable {

	public function getTimeLived(){
		return ($this->getYearDead()-$this->getYearBirth());
	}

	public function getGenerationNum(){
		return '1';
	}

	public function __toString() {
		return
			"1.Identifiable: {$this->getName()}, {$this->getYearDead()} – {$this->getYearBirth()},
			 lived {$this->getTimeLived()} years \n";
	}
}