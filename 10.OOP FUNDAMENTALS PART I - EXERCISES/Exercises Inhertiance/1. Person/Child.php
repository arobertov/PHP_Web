<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 10:42
 */
declare(strict_types = 1);
include('Person.php');
class Child extends Identifiable
{
    public function setAge(int $age)
    {
        if($age > 16) {
            throw new Exception("Child's age must be less than 16!");
        }
        parent::setAge($age);
    }
}