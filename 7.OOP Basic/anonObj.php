<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 10:24
 */
$obj= new stdClass();
$obj->fname = 'Angel';
$obj->lname = 'Robertov';
$obj->age = '38 years';
$obj->weight = '105 kg';
$obj->height = '186 sm';
$obj->town = 'Sofia';
$obj->district = 'Poduene';
$obj->street = 'Vitinja';
$obj->streetNumber = 68;
$obj->floor = 2;

foreach ($obj as $name=>$value) {
	echo "$name -> $value \n";
}