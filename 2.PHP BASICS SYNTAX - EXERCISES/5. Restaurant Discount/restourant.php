<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 22.9.2017 г.
 * Time: 11:54
 */
$groupSize = intval(fgets(STDIN));
$package= trim(fgets(STDIN));

$smallHall = 2500;
$terrace = 5000;
$greatHall = 7500;

$price = 0;
$discount = 0;
$total = 0;
$hall = "";
switch ($package){
	case "Normal":
		$discount = 0.05;
		$price =  500;
		break;
	case "Gold":
		$discount = 0.1;
		$price = 750;
		break;
	case "Platinum":
		$discount= 0.15;
		$price = 1000;
		break;
		
}
if($groupSize<=50){
	$dis = ($smallHall+$price)*$discount;
	$total = ($smallHall+$price)-$dis;
	$hall = "Small Hall";
} elseif ($groupSize>50 && $groupSize<=100) {
	$dis = ($terrace+$price)*$discount;
	$total = ($terrace+$price)-$dis;
	$hall = "Terrace";
} elseif ($groupSize>100 && $groupSize <=120) {
	$dis = ($greatHall+$price)*$discount;
	$total = ($greatHall+$price)-$dis;
	$hall = "Great Hall";
} elseif ($groupSize>120) {
	echo "We do not have an appropriate hall.";
	return;
}
$pricePerPerson = $total / $groupSize;
echo "We can offer you the $hall
The price per persons is ".number_format($pricePerPerson,2,'.',',')."$";
