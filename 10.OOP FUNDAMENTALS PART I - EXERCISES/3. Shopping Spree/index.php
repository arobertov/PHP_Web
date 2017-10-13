<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 6.10.2017 г.
 * Time: 21:04
 */
include ('Person.php');
include ('Product.php');
$personMoney  = explode(';',trim(fgets(STDIN)));
$productPrice = explode(';',trim(fgets(STDIN)));
$persons      = [];
$products     = [];
 for($i=0;$i< count($personMoney) - 1;$i++){
 	 $data = explode('=',$personMoney[$i]);
 	 $person = new Identifiable($data[0],$data[1]);
 	 $persons[] = $person;
 }
for($i=0;$i< count($productPrice) - 1;$i++){
 	 $data = explode('=',$productPrice[$i]);
 	 $product= new Product($data[0],$data[1]);
 	 $products[] = $product;
}
$i=0;
while (1){
	$input =trim(fgets(STDIN));
	if($input=='END'){
		break;
	}
	$arr = explode(' ',$input);
	$personName = $arr[0];
	$productName = $arr[1];
	foreach ($persons as $person){
		if($person->getName()==$personName){
			foreach ($products as $product){
				if($productName == $product->getName()) {
					if ( $person->getMoney() >= $product->getCost() ) {
						$bagOfProducts [$personName][] = $product->getName();
						$person->setBagOfProducts( $bagOfProducts[$personName] );
						$person->setMoney( $person->getMoney() - $product->getCost() );
						echo $person->getName() . " bought " . $productName . "\n";
						
					} else {
						echo $person->getName() . " can't afford " . $productName . "\n";
					}
				}
			}
			break;
		}
	}
}

foreach ($persons as $person){
	echo $person ->getName()." - ";
	if($person->getBagOfProducts()==0) {
	  echo "Nothing bought \n";
	  continue;
	}else {
		foreach ( $person->getBagOfProducts() as $productes ) {
			echo $productes . ",";
		}
		echo "\n";
	}
}