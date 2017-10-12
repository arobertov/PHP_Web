<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 22:05
 */
declare(strict_types=1);
include ('Rectangle.php');
$width = floatval(trim(fgets(STDIN)));
$height = floatval(trim(fgets(STDIN)));

$myRec = new Rectangle($width,$height);
echo $myRec;