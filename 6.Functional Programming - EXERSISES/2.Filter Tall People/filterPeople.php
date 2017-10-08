<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 10:55
 */
$people = [
	['name' => 'John', 'height' => 1.65],
	['name' => 'Peter', 'height' => 1.85],
	['name' => 'Silvia', 'height' => 1.69],
	['name' => 'Martin', 'height' => 1.82]
];
print_r(array_filter($people, 
	function ($kvp): bool {
		return $kvp['height'] > 1.80;
	}
));