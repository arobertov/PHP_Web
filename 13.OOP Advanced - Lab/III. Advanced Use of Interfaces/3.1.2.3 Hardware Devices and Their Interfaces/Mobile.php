<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 23:13
 */

abstract class Mobile {
	protected $operator;
	protected $canCall;
	protected $battery;

	public function __construct($operator, $canCall, $battery) {
		$this->operator = $operator;
		$this->canCall = $canCall;
		$this->battery = $battery;
	}
}