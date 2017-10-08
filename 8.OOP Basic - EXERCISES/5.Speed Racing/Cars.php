<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 17:21
 */

class Cars {
   public $model;
   public $fuelAmount;
   public $fuelCostForKm;
   public $distance = 0;


   public function __construct($input) {
       $this->model = $input[0];
       $this->fuelAmount =  $input[1];
       $this->fuelCostForKm = $input[2];
   }
}