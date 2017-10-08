<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 13:59
 */

class Worker extends Human
{
      protected $weekSalary;
      protected $workHoursPerDay;

	public function __construct( $firstName, $lastName, $weekSalary, $workHoursPerDay ) {
		parent::__construct( $firstName, $lastName );
		 $this-> setWeekSalary( $weekSalary );
		 $this->setWorkHoursPerDay($workHoursPerDay);
	}

	/**
	 * @return mixed
	 */
	public function getWeekSalary() {
		return $this->weekSalary;
	}

	public function getSalaryPerHour() {
		if($this->getWeekSalary()>0) {
			return $this->getWeekSalary() / ( 7 * $this->getWorkHoursPerDay() );
		} else {
			return 0;
		}
	}

	/**
	 * @param mixed $weekSalary
	 */
	public function setWeekSalary( $weekSalary ) {
		if(strlen($weekSalary) > 10){
			throw new Exception("Expected value mismatch!Argument: $weekSalary");
		}
		$this->weekSalary = $weekSalary;
	}

	/**
	 * @return mixed
	 */
	public function getWorkHoursPerDay() {
		return $this->workHoursPerDay;
	}

	/**
	 * @param mixed $workHoursPerDay
	 */
	public function setWorkHoursPerDay( $workHoursPerDay ) {
		if($workHoursPerDay < 1 || $workHoursPerDay > 12){
			throw new Exception("Expected value mismatch!Argument: $workHoursPerDay");
		}
		$this->workHoursPerDay = $workHoursPerDay;
	}

	public function __toString() {
		return
		"First Name: " .  $this->getFirstName()  .
		"\n Last Name: ". $this->getLastName()  .
		"\n Week Salary: " . number_format($this->getWeekSalary(),'2','.','')  .
		"\n Hours per day: ". number_format($this->getWorkHoursPerDay(),'2','.','')  .
		"\n Salary per hour: ". number_format($this->getSalaryPerHour(),'2','.','')  . "\n";
	}
}