<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 22.9.2017 г.
 * Time: 0:29
 */
$numberOne = floatval(fgets(STDIN));
$numberTwo = floatval(fgets(STDIN));

$result = ($numberOne+$numberTwo);

echo '$firstNumber + $secondNumber = '.$numberOne.' + '.$numberTwo.' = '.number_format($result,2,'.',',');