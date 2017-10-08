<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 5.10.2017 г.
 * Time: 21:04
 */
declare(strict_types = 1);
class Person {
    protected $name;
    protected $age;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        if(strlen($name)<3){
            throw  new Exception("Name’s length should not be less than 3 symbols!");
        }
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age)
    {
        if($age < 1){
            throw new Exception("Age must be positive");
        }
        $this->age = $age;
    }



    function __construct(string $name, int $age){
        $this->setName($name);
        $this->setAge($age);
    }

}

$person = new Person('Ani', 58);