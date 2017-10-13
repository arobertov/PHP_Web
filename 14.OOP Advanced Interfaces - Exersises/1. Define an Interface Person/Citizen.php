<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 12.10.2017 г.
 * Time: 18:53
 */
include ('Person.php');
class Citizen implements Identifiable
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
       $this->setName($name);
       $this->setAge($age);
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setAge(int $age)
    {
        $this->age = $age;
    }

    public function __toString()
    {
        return $this->name .' , '.$this->age;
    }

}