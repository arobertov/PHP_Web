<?php
declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 12:29
 */
class Person {
	public $name;
	public $age;

	public function __construct(string $name,int $age) {
		$this->name = $name;
		$this->age = $age;
	}

	public function __toString() {
		return $this->name.' - '.$this->age."\n";
	}
}

$count = (int)trim(fgets(STDIN));
for($i=0;$i<$count;$i++){
	$input = explode(' ',
		(trim(fgets(STDIN)))
	);
	if($input[1]>30) {
		$person[] = new Identifiable( (string)$input[0], (int)($input[1]) );
	}
}

asort($person);
foreach ($person as $value) {
	echo $value;
}