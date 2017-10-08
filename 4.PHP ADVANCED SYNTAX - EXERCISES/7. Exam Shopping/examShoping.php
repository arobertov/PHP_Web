<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 25.9.2017 г.
 * Time: 17:52
 */

function addProduct($productList,$product,$quantity){

	 if(!array_key_exists($product,$productList)){
	 	$productList[$product] = $quantity;
	 } else {
	 	$productList[$product] +=$quantity;
	 }
	 return $productList;
}

function buyProduct ($productList,$product,$quantity){
	if(!array_key_exists($product,$productList)){
		echo "$product doesn't exist.";
		return $productList;
	}
	if($productList[$product] <= 0){
		echo "$product out of stock.";
		return $productList;
	}
	if($productList[$product] > 0 && $productList[$product]<$quantity){
		$productList[$product] = 0;
		return $productList;
	}
	if($productList[$product]>=$quantity){
		$productList[$product] -= $quantity;
		return $productList;
	}

}

$productList = [] ;

while (true){
	$input = trim(fgets(STDIN));

	if($input == 'exam time'){
		break;
	}
	if($input == 'shopping time') {
		continue;
	}
	$arr = explode(' ',$input);

	$command  = $arr[0];
	$product  = $arr[1];
	$quantity = $arr[2];

	if($command == 'stock') {
		$productList = addProduct($productList,$product,$quantity);
	}
	if($command == 'buy'){
		$productList = buyProduct($productList,$product,@$quantity);
	}


	print_r($productList);
}
foreach ($productList as $key=>$value){
	if($value > 0){
		echo "$key -> $value \n";
	}
}