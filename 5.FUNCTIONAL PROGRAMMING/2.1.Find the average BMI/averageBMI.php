<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 27.9.2017 г.
 * Time: 10:28
 */

$people = [
	[ 'name' => 'John'  , 'weight' => 69, 'height'  => 1.69 ],
	[ 'name' => 'Peter' , 'weight' => 85, 'height'  => 1.68 ],
	[ 'name' => 'Ivan'  , 'weight' => 75, 'height'  => 1.72 ],
	[ 'name' => 'Mitko' , 'weight' => 95, 'height'  => 1.70 ]
];


$bmindex = array_map(function ($people){
	return $people['weight']/($people['height'] * $people['height']);
}
	,$people
);
$bmiCalcAvg = function ($a,$b){
	$a += $b;
	return $a;
};

$bmiAvg = array_reduce($bmindex,$bmiCalcAvg);

echo '<pre>';
print_r($bmiAvg/count($bmindex));
echo '</pre>';
