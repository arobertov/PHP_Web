<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 12.10.2017 г.
 * Time: 18:53
 */
include ('Identifiable.php');
include ('Person.php');
include ('BirthDate.php');
class Citizen implements Identifiable,Person,BirthDate
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

	public function setName($name) {
 // TODO: Implement setName() method.
}
public function setAge($age) {
 // TODO: Implement setAge() method.
}
public function setId($id) {
 // TODO: Implement setId() method.
}
public function setBirthDate($birthDate) {
 // TODO: Implement setBirthDate() method.
}
    public function __toString()
    {
        return $this->name .' , '.$this->age.
            ' , ID = , '.$this->id. ' , '.$this->birthDate;
    }

}