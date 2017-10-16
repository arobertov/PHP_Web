<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 15.10.2017 г.
 * Time: 9:43
 */
include ('SmartPhone.php');
while (1){
	$inputNumbers = explode(' ',trim(fgets(STDIN)));
	$inputUrls = explode(' ',trim(fgets(STDIN)));

	$call = new SmartPhone();
	$browse = new SmartPhone();

	$call->setNumbers($inputNumbers);
	$browse->setUrls($inputUrls);
		
	$call->calling();
	$browse->browsing();
	
}
