<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 27.9.2017 г.
 * Time: 10:28
 */
/* ------------------------ Input --------------------------------*/
$people = [
	[ 'name' => 'John'  , 'weight' => 69, 'height'  => 1.69 ],
	[ 'name' => 'Peter' , 'weight' => 85, 'height'  => 1.68 ],
	[ 'name' => 'Ivan'  , 'weight' => 75, 'height'  => 1.72 ],
	[ 'name' => 'Mitko' , 'weight' => 95, 'height'  => 1.70 ]
];

// min BMI value filter
$filter = 30;


$bmindex = array_map(function ($people) {
	return $people['weight']/($people['height'] * $people['height']);
}
	,$people
);

$bmiCalcAvg = function ($a,$b) use ($filter){
	static $counter = 0;
	if($b > $filter){
		$counter++;
		$a += $b;
	}
	return $a;
};

$bmiAvg = array_reduce($bmindex,$bmiCalcAvg);

$divider = array_filter($bmindex,function ($bmindex)use($filter){
	if($bmindex > $filter) {
		return true;
} else {return false;}
});
echo '<pre>';
print_r($bmiAvg/count($divider));
echo '</pre>';


