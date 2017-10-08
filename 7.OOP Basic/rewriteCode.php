<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 10:09
 */
class MathCalc {
	private $a;
	private $b;
	private $x;

	function math_sum($a,$b){
		return $a+$b;
	}

	function math_div($a,$b){
		$this->math_check_if_zero($a);
		$this->math_check_if_zero($b);
		return $a / $b;
	}

	private function math_check_if_zero($x){
		if($x == 0){
			echo "division by zero is not possible";
			exit;
		}
	}

}


$sum = new MathCalc();
$div = new MathCalc();

echo $sum->math_sum(5,5)."\n";
echo $div->math_div(10,2)."\n";
