<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 10.10.2017 г.
 * Time: 20:25
 */
include ('Son.php');
class GrandSon extends Son{
	public function getTimeLived(){
		return ($this->getYearDead()-$this->getYearBirth());;
	}

	public function getGenerationNum(){
		return 3;
	}

	public function __toString() {
		return
			"3.Grand Son: {$this->getName()}, {$this->getYearDead()} – {$this->getYearBirth()},
			 lived {$this->getTimeLived()} years \n";
	}
}