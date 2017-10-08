<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 22:39
 */

class Engine {
   public $speed;
   public $power;

   public function __construct(int $speed,int $power) {
	   $this->speed = $speed;
	   $this->power = $power;
   }
}