<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 21:40
 */
declare(strict_types=1);
include ('Circle.php');
$radius = floatval(trim(fgets(STDIN)));

$circle = new Circle($radius);
echo $circle;