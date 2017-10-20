<?php
include ('CallCenter.php');
 echo "Please select an app number from list below: \n";
 echo "1 - Call Center Application. \n";
 echo "2 - Add Currency and Continent. \n";
 echo "3 - Special Ski Equipment. \n";
 echo "4 - Add Costumer Functionality \n";

 echo 'Please insert:';
 $num = trim(fgets(STDIN));
$app =new CallCenter();

$app->main($num);