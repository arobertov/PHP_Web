<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 17:05
 */
  /* ---------  declare functions ----------------- */

  function getLimit($zone){
  	switch ($zone){
	    case 'motorway':
	    	return $spLimit = 130;
	    case 'interstate':
	    	return $spLimit = 90;
	    case 'city':
		    return $spLimit = 50;
	    case 'residential':
		    return $spLimit = 20;
	    default:
	    	echo 'Not a valid input !!!';
	    	return $spLimit = 1000;
    }
  }

  function getInfraction($speed,$limit){
  	$overSpeed = $speed - $limit;
  	if ($overSpeed <= 0){
  		$result = false;
    } else {
  		$result =  true;
    }
    return $result;
  }

  /* --------------- implement code -------------- */

  $speed = trim(intval(fgets(STDIN)));
  $zone = trim(fgets(STDIN));
  $limit  = getLimit($zone);
  $isInfraction = getInfraction($speed,$limit);
  if ($isInfraction){
  	$overSpeed = $speed-$limit;
  	if($overSpeed < 20){
	    echo 'speeding';
    }
  	elseif ($overSpeed > 20 && $overSpeed < 40){
  		echo 'excessive speeding';
    } else if ($overSpeed > 40) {
  		echo 'reckless driving';
    }
  }