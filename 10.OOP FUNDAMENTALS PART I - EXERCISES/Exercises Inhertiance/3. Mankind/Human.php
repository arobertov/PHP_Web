<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 13:43
 */
include ('Student.php');
include ('Worker.php');
class Human
{
    protected $firstName;
    protected $lastName;

    /**
     * Human constructor.
     * @param $firstName
     * @param $lastName
     */
    public function __construct( string $firstName,string $lastName)
    {
        $this->setFirstName($firstName) ;
        $this->setLastName($lastName) ;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        if($firstName[0] != strtoupper($firstName[0])){
            throw new Exception("Expected uppercase letter ! 
            Argument: ".$firstName);
        } elseif (strlen($firstName) < 4){
            throw new Exception("Expected length at least 4 symbols !
            Argument: ".$firstName);
        }
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        if($lastName[0] != strtoupper($lastName[0])){
            throw new Exception("Expected uppercase letter ! 
            Argument: ".$lastName);
        } elseif (strlen($lastName) < 3){
            throw new Exception("Expected length at least 4 symbols !
            Argument: ".$lastName);
        }
        $this->lastName = $lastName;
    }


}