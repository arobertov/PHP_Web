<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21.9.2017 г.
 * Time: 18:53
 */
while ($number = intval(fgets(STDIN))){
	$numbers[] = $number;
}

echo "Max: " . max($numbers);