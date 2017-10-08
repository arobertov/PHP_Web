<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 13:54
 */

class Student extends Human
{
    /**
     * @var string
     */
    protected $facultyNumber;

    /**
     * @return string
     */
    public function getFacultyNumber(): string
    {
        return $this->facultyNumber;
    }

    /**
     * @param string $facultyNumber
     */
    public function setFacultyNumber(string $facultyNumber)
    {
        if(strlen($facultyNumber)<5 || strlen($facultyNumber)>10){
            throw new Exception("Invalid faculty number!");
        }
        $this->facultyNumber = $facultyNumber;
    }





}