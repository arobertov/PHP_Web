<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 21.9.2017 г.
 * Time: 11:17
 */
$numberOne = intval(fgets(STDIN));
$numberTwo = intval(fgets(STDIN));
$numberThree = intval(fgets(STDIN));

$largestOneTwo = max($numberOne,$numberTwo);
$largest       = max($largestOneTwo,$numberThree);

echo "Max: " . $largest;