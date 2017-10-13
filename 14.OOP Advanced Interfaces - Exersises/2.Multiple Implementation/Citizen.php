<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 12.10.2017 г.
 * Time: 18:53
 */
include ('Identifiable.php');
class Citizen implements Identifiable
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

    public function __construct($name, $age, $id,  $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthDate($birthDate);
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setAge($age)
    {
        $this->age = $age;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
    }


    public function __toString()
    {
        return $this->name .' , '.$this->age.
            ' , ID = , '.$this->id. ' , '.$this->birthDate;
    }

}