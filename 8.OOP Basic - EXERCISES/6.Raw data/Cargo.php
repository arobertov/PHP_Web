<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 1.10.2017 г.
 * Time: 22:43
 */

class Cargo {
	public $weight;
	public $type;

	public function __construct(int $weight,string $type) {
		$this->weight = $weight;
		$this->type = $type;
	}
}