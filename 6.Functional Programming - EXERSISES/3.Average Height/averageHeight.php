<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 10:58
 */

$people = [
	['name' => 'John', 'height' => 1.65],
	['name' => 'Peter', 'height' => 1.85],
	['name' => 'Silvia', 'height' => 1.69],
	['name' => 'Martin', 'height' => 1.82]
];
$averageHeight = array_reduce($people, 
		function ($carry, $item): float {
			return $carry += $item['height'];
		}
                 ) / count($people);
echo "Average height is $averageHeight meters";