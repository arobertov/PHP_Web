<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 3.10.2017 г.
 * Time: 18:57
 */

include ('Trainer.php');
include ('Pokemon.php');

$trainers = [];
$pokemons = [];
while (1){
	$input = explode(' ',trim(fgets(STDIN)));
	if($input[0] == 'Tournament'){
		break;
	}
	$trainer = $input[0];
	$pkName = $input[1];
	$pkElement = $input[2];
	$pkHealth = $input[3];

		$trainers [$trainer] = [['pkName'=> $pkName],$pkElement,$pkHealth ] ;
	
}

print_r($trainers);
echo "\n";

/**
while (1){
	$input = trim(fgets(STDIN));
	if($input == 'End'){
		break;
	}
	foreach ($pokemons as $pokemon) {

	}  if($pokemon->getPkElement()==$input){
		foreach ($trainers as $trainer){
			
		}
	}
}
 */