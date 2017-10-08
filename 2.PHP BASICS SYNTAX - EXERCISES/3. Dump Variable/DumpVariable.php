<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 22.9.2017 г.
 * Time: 0:42
 */
$input = trim(fgets(STDIN));

if(is_numeric($input)){
	var_dump($input);
} else {
	echo gettype($input);
}

