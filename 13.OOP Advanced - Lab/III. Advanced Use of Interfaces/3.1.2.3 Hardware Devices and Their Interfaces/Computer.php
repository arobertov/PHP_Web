<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 11.10.2017 г.
 * Time: 22:57
 */

abstract class Computer {
  	protected $processor;
    protected $ram;

	public function __construct(int $processor,int $ram ) {
		$this->processor = $processor;
		$this->ram = $ram;
	}
}