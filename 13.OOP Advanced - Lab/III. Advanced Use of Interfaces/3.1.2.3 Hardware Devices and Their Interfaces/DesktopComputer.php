<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 23:01
 */

class DesktopComputer extends Computer implements Keybord ,Mouse {
	public function pressKey() {
		// TODO: Implement pressKey() method.
	}

	public function changeStatus() {
		// TODO: Implement changeStatus() method.
	}

	public function click(bool $leftClick=false,bool $rightClick=false) {
		if($leftClick==false || $rightClick==false){
			return false;
		} else {
			return true;
		}
	}

	public function move(int $currentX, int $currentY, int $offsetX, int $offsetY) {
		$newX = $currentX+$offsetX;
		$newY = $currentY+$offsetY;
		return array($newX,$newY);
	}

	public function keyboardConnected(){
		// TODO: ..............
	}

}