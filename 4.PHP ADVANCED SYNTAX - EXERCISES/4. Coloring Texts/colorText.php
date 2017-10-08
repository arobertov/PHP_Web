<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 24.9.2017 г.
 * Time: 22:36
 */
function setLetterColor($ascii){
	if($ascii%2==0){
		return 'red';
	} else {
		return 'blue';
	}
}

$input = 'What a wonderful world!';
$str = str_replace(' ','',$input);

for ($i=0;$i<strlen($str);$i++){
	$ascii = ord($str[$i]);
	$color = setLetterColor($ascii);
	echo "<span style='color:$color'>$str[$i]&nbsp;</span>";
}