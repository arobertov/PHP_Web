<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 10.10.2017 г.
 * Time: 20:26
 */
/*
1.James Strong lived from 1873 to 1923. He had two sons:
1.1. Peter Strong lived from 1894 only some 34 years and died
1.3. Andrew Strong lived from 1899 to 1970 and was a blessed person whom everybody loved
Andrew Strong had 3 daughters and 3 sons as follows:
2.1. Jackson Strong was born when Andrew was 28 years old and lived 65 years.
2.2. Martin Strong was born in 1927 and died in 1967
2.3. Gregory Strong was born in 1931 and lived for 69 years
Use the Father, Son and GrandSon classes
*/
include('GrandSon.php');
$average = 0;
$input1['Father'] = ['James Strong',1873,1923];
$input1['Son']=['Peter Strong',1894,1928];
$input1['GrandSon']=['Andrew Strong',1899,1970];
$fatherData = $input1['Father'];
	list( $name, $yearBirth, $yearDead ) = $fatherData;
	$father = new Father( $name, $yearBirth, $yearDead );
	$average += $father->getTimeLived();
	echo $father;
$sonData = $input1['Son'];
	list( $name, $yearBirth, $yearDead ) = $sonData;
	$son = new Son( $name, $yearBirth, $yearDead );
	$average += $son->getTimeLived();
	echo $son;
$grandSonData = $input1['GrandSon'];
	list( $name, $yearBirth, $yearDead ) = $grandSonData;
	$grandSon = new GrandSon( $name, $yearBirth, $yearDead );
	$average += $grandSon->getTimeLived();
	echo $grandSon;
	$average = round(($average/3));
	echo "Average Lifespan: {$average} years";