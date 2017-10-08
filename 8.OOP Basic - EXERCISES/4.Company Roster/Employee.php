<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 14:56
 */

class Employee {
	private $name;
    public  $salary;
    private $position;
    private $department;
    private $email = 'n/a';
    private $age = '-1';

    public function __construct($input) {
	    $this->name = $input[0];
	    $this->salary = round($input[1],2);
	    $this->position = $input[2];
	    $this->department = $input[3];
	    if(isset($input[4]))
	       $this->email = $input[4];
	    if(isset($input[5]))
	       $this->age = $input[5];
    }

}