<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 14:38
 */
include ('Bycicle.php');
$b1 = new Bicycle('','Green','Begach','Barz','1958','Yes');
$b1->setRide(1);
$b1->setStop(0);
$b2 = new Bicycle('','Blue','Cross','Mountain bicycle','2007','No');
$b2->setRide(0);
$b2->setStop('STOP');

echo "<style>table, th, td {border: 1px solid black;}</style>
		<table>
		<tr><th>Model</th>
		<th>Brand</th>
		<th>Year</th>
		<th>For Skirt</th>
		<th>Ride</th>
		<th>Stop</th></tr>";
echo $b1;
echo $b2;
echo "</table>";
