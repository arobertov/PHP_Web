<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 24.10.2017 г.
 * Time: 15:54
 */

class InsertDatabaseTransaction
{
    private $inst;

    public function __construct($db)
    {
        $this->inst = $db;
    }
    public function checkCourse($courseName){
       try{
           $db_stm = $this->inst->prepare("SELECT * FROM `courses` WHERE `course_name` = ?");
           $db_stm->execute(array($courseName));
           return $db_stm->rowCount();
       } catch (PDOException $e){
           echo $e->getMessage().PHP_EOL;
       }
    }

    public function insertData($firstName,$lastName,$studentNumber,$courseName){
        try{
            if($result = $this->checkCourse($courseName)==0){
                throw new PDOException('No such course');
            }
            // ----- start transaction in db_config file ------ //
            $db_stm = $this->inst->prepare("
                                            INSERT INTO `php-cource`.`students` (`first_name`, `last_name`, `student_number`) 
                                            VALUES (?, ?, ?);
            ");
            $db_stm->execute(array($firstName,$lastName,$studentNumber));
            $this->inst->commit();

        }catch (PDOException $e){
            $this->inst->rollBack();
            echo $e->getMessage().PHP_EOL;
        }

    }
}