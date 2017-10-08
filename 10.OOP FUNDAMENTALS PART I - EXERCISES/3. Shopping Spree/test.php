<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 7.10.2017 г.
 * Time: 0:07
 */
include ('Product.php');
class Test {
	private $sum;

	/**
	 * @return array
	 */
	public function getSum() {
		return $this->sum;
	}

	/**
	 * @param array $sum
	 */
	public function setSum( $sum ) {
		$this->sum = $sum;
	}


}


