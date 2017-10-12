<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 22:42
 */
interface Mouse {
	public function click(bool $leftClick,bool $rightClick);
	public function move(int $currentX, int $currentY, int $offsetX, int $offsetY);
}