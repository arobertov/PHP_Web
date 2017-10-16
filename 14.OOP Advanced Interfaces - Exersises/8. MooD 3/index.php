<?php
include ('Demon.php');
$input = explode('|',trim(fgets(STDIN)));
$in = [];
foreach ($input as $value){
	$in[] = trim($value);
}
list($name,$type,$point,$level) = $in;
if($type == 'Archangel'){
	$archangel = new Archangel($name,$type,$point,$level);
	echo $archangel;
}elseif ($type == 'Demon'){
	$demon = new Demon($name,$type,$point,$level);
	echo $demon;
}
