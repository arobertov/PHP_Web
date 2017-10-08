<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 11:50
 */
class Person {
	public $name;
	public $age;
}

$person = new Person();
echo(count(get_object_vars($person)));
