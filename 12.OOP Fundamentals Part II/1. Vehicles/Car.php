<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 9.10.2017 г.
 * Time: 21:08
 */
include ('Vehicle.php');

class Car extends Vehicle
{
    public function setFuel($fuel){
        $this->fuel = $fuel;
    }

    public function  getFuel(){
        return $this->fuel;
    }

    public function setFpKm ($fpKm){
        $this->fpKm = ($fpKm+0.9);
    }

    public function getFpKm (){
        return $this->fpKm;
    }

    public function setTravelled ($travelled){
        $this->travelled += $travelled;
    }

    function getTravelled (){
        return $this->travelled;
    }

    public function checkOperation($quantity){
        if(($quantity*$this->getFpKm()) < $this->getFuel()){
            $this->setFuel($this->getFuel() - ($quantity*$this->getFpKm()));
            $this->setTravelled($quantity);
            return true;
        } else {
            return false;
        }
    }

    public function __construct(float $fuel, float $fpKm,float $travelled)
    {
        $this->setFuel($fuel);
        $this->setFpKm($fpKm);
        $this->setTravelled($travelled);
    }

    public function __toString()
    {
        return "Car: " . round($this->getFuel(),2) . "\n";
    }
}