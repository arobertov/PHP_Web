<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 10:59
 */
$room = [
	'kithen' => ['width' => 3, 'length' => 2, 'height' => 2.4],
	'living_room' => ['width' => 6, 'length' => 4, 'height' => 2.4],
	'bedroom' => ['width' => 5, 'length' => 3, 'height' => 2.2],
];
print_r(array_map(function (&$value) {
		return $value['width'] * $value['length'] * $value['height'];
	}, 
		$room
	)
);