<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 15:46
 */
include ('Box.php');
$length = floatval(trim(fgets(STDIN)));
$weight = floatval(trim(fgets(STDIN)));
$height = floatval(trim(fgets(STDIN)));

$box = new Box($length,$weight,$height);
echo "Surface Area - ".  number_format($box->surArea(),2,'.',',')."\n";
echo "Lateral Surface Area – ". number_format($box->latSurArea(),2,'.',',')."\n";
echo "Volume - ". number_format($box->volume(),2,'.',',')."\n";
