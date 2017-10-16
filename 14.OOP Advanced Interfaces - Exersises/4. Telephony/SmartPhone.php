<?php
/**
 * Created by PhpStorm.
 * User: Angel
 * Date: 15.10.2017 г.
 * Time: 10:25
 */
 include ('Call.php');
 include ('Browse.php');
class SmartPhone implements Call,Browse {
	/**
	 * @var array
	 */
	private $numbers;

	/**
	 * @var array
	 */
	private $urls;

	public function browsing() {
		foreach ($this->urls as $url){
			if(preg_match('/\\d/', $url) > 0){
				echo "Invalid URL! \n";
				continue;
			}
			echo "Browsing: $url \n";
		}
	}

	public function calling() {
		foreach ($this->numbers as $number){
			echo "Calling... $number \n";
		}
	}

	/**
	 * @return array
	 */
	public function getNumbers(): array {
		return $this->numbers;
	}

	/**
	 * @param array $numbers
	 */
	public function setNumbers( array $numbers ) {
		$this->numbers = $numbers;
	}

	/**
	 * @return array
	 */
	public function getUrls(): array {
		return $this->urls;
	}

	/**
	 * @param array $urls
	 */
	public function setUrls( array $urls ) {
		$this->urls = $urls;
	}




}