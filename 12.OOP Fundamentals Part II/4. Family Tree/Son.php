<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 10.10.2017 г.
 * Time: 20:19
 */
include ('Father.php');
class Son extends Father {



	public function getTimeLived(){
		return ($this->getYearDead()-$this->getYearBirth());
	}

	public function getGenerationNum(){
		return 2;
	}

	public function __toString() {
		return
			"2.Son: {$this->getName()}, {$this->getYearDead()} – {$this->getYearBirth()},
			 lived {$this->getTimeLived()} years \n";
	}
}