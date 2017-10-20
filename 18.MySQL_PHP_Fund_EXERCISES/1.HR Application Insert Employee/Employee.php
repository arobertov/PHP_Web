<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 20.10.2017 г.
 * Time: 21:30
 */

class Employee
{
    private $inst;

    public function __construct($db)
    {
        $this->inst = $db;
    }

    //, First Name, Middle Name, Last name, department, position, passport ID
    public function insertEmployee($firstName, $middleName, $lastName, $department, $position, $passportId)
    {
        try {
            $db_stm = $this->inst->prepare("
                            INSERT INTO `employee`(`first_name`,`middle_name`,`last_name`,`department`,`position`,`passport_id`)
                            VALUES (:firstName,:middleName,:lastName,:department,:pos,:passportId)
                            ");
            $db_stm->bindParam('firstName', $firstName);
            $db_stm->bindParam('middleName', $middleName);
            $db_stm->bindParam('lastName', $lastName);
            $db_stm->bindParam('department', $department);
            $db_stm->bindParam('pos',$position);
            $db_stm->bindParam('passportId', $passportId);

            if ($db_stm -> execute()) {
                return true;
            } else return false;
        } catch (PDOException $e) {
            print "PDO Error: " . $e->getMessage() .PHP_EOL;
        }
    }
}