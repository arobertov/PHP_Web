<?php
$animals = [
	[ 'name' => 'Waffles', 'type' => 'dog', 'age'  => 12],
	[ 'name' => 'Fluffy', 'type' => 'cat', 'age'  => 14],
	[ 'name' => 'Spelunky', 'type' => 'dog', 'age'  => 4],
	[ 'name' => 'Hank', 'type' => 'dog', 'age'  => 11],
];

$youngDogs = function ($animals,$filterAge = 15){
	if($animals['type'] == "dog" && $animals['age'] < $filterAge){
		return true;
	} else {
		return false;
	}
};

$output = array_filter($animals,$youngDogs);

echo '<pre>';
print_r($output);
echo '</pre>';