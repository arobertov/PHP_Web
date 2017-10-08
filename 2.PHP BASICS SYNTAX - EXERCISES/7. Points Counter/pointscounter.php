<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 23.9.2017 г.
 * Time: 12:11
 */
/* declare variables  */

$total =[];
$team = '';
$player = '';
$score = 0;
$input = '';
/* check command loop  */
do {
	$input = trim( fgets( STDIN ) );
	if ($input === "Result") {
		continue;
	} else {
		$data = explode( '|', $input );

		$pattern      = '/([*@%$])/';
		$cleanData[2] = intval( $data[2] );

		for ( $i = 0; $i < count( $data ); $i ++ ) {
			$cleanData[ $i ] = preg_replace( $pattern, '', $data[ $i ] );
			if ( ctype_upper( $cleanData[ $i ] ) ) {
				$team = $cleanData[ $i ];
			} elseif ( is_numeric( $cleanData[ $i ] ) ) {
				$score = $cleanData[ $i ];
			} else {
				$player = $cleanData[ $i ];
			}
		}

		if ( empty( $total ) || ! array_key_exists ($team,$total) ) {
			$total[ $team ] = [ $player => $score, 'sumScore' => $score ];
		} else  {
			foreach ($total[$team] as $value){
				if($value < $score){
					$sumScore = $total[$team]['sumScore'] + $score;
					$total[ $team ] = [ $player => $score, 'sumScore' => $sumScore ];
					break;
				} else {
					$sumScore = $total[$team]['sumScore'] + $score;
					$total[ $team ]['sumScore'] = $sumScore;
					break;
				}
			}
		}
	}
} while($input!='Result');

$sortByScore = uasort($total,function ($a,$b){
	return $b['sumScore'] - $a['sumScore'];
});

	foreach ($total as $key=>$value) {
		echo $key.' => '.$value['sumScore']."\n";
		 foreach ($value as $k=>$v){
		 	 echo "Most points scored by $k \n";
		 	 break;
		 }
	}


