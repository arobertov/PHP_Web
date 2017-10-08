<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 3.10.2017 г.
 * Time: 15:10
 */
include ('Car.php');
include ('Engine.php');
/** ---------- Define Check Engine Function ----------- */

function engineCheck( array $engines, string $engineModel ){
	foreach ($engines as $engine) {
		if ( $engine->getModel() == $engineModel ) {
			return $engine;
		}
	}
	return false;
}

/**------------------  Register engines ----------------*/

$countEngine = trim( fgets(STDIN ));
$engines     = [];
for($i=0; $i < $countEngine;$i++){
	$input = explode(' ',trim(fgets(STDIN)));
	$engine = new Engine($input);
	$engines[$i] = $engine;
}

/** --------------------- Register Cars -----------------*/

$countCars = trim( fgets(STDIN ));
$cars = [];
for($i=0;$i<$countCars;$i++){
	$input = explode(' ',trim(fgets(STDIN)) );
	if($engineCheck = engineCheck($engines,$input[1])){
		$car = new Car($input,$engineCheck);
		$cars[$i] = $car;
	}else {
		echo 'Error';
	}
}

//*----------  Print Result ------------------ */
      foreach ($cars as $car) {
	       echo $car;
      }

      /** echo  $car->getModel().": \n".
      $car->getEngine()->getModel().": \n".
      "    Power: ". $car->getEngine()->getPower()."\n".
      "    Displacement: ".$car->getEngine()->getDisplacement()."\n".
      "    Efficiency:: ".$car->getEngine()->getEfficiency()."\n".
      "Weight:".$car->getWeight()."\n".
      "Color: ".$car->getColor()."\n";
      echo "\n"; */