<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 21:40
 */

class Car {
   public $model;
   public $engine;
   public $cargo;
   public $tires;

   public function __construct(string $model,Engine $engine,Cargo $cargo,array $tires) {
   	   $this->model = $model;
   	   $this->engine = $engine;
   	   $this->cargo = $cargo;
   	   $this->tires = $tires;
   }
}