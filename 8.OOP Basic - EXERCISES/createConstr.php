<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 12:17
 */

class Person {
	public $name;
	public $age;

	public function __construct($name, $age) {
		$this->name = $name;
		$this->age = $age;
		echo $this->name . " " . $this->age;
	}
}

$name = trim(fgets(STDIN));
$age = trim(fgets(STDIN));

$person1 = new Person($name,$age);