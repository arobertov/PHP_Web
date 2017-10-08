<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 23.9.2017 г.
 * Time: 22:00
 */
$input = trim( fgets( STDIN ) );
$sequence = explode(' ',$input);

$stop = count($sequence);
$longestSeqLength = 1;
$longestSeqStart = 0;
$currentSeqLength = 1;
$currentSeqStart = 0;

for($i=1;$i<$stop;$i++){

	if($sequence[$i] == $sequence[$i-1]) {
		$currentSeqLength ++;

		if ( $currentSeqLength > $longestSeqLength ) {
			$longestSeqLength = $currentSeqLength;
			$longestSeqStart  = $currentSeqStart;
		}
	} else {
		$currentSeqLength = 1;
		$currentSeqStart = $i;
	}
}

for($j = $longestSeqStart;$j<$longestSeqStart+$longestSeqLength;$j++){
	echo $sequence[$j]. ' ';
}