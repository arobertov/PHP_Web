<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 12.10.2017 г.
 * Time: 13:41
 */

class Notebook extends Computer implements Keybord ,Mouse ,TouchScreen {

	private $writtenText;


	public function writeText() {
		return	$this->writtenText;
	}

	public function pressKey() {
		// TODO: Implement pressKey() method.
	}

	public function changeStatus() {
		// TODO: Implement changeStatus() method.
	}

	public function click() {
		// TODO: Implement click() method.
	}

	public function move() {
		// TODO: Implement move() method.
	}

	public function moveFinger() {
		// TODO: Implement moveFinger() method.
	}

	public function clickFinger() {
		// TODO: Implement clickFinger() method.
	}
}