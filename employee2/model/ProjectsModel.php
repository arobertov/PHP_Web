<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 1.11.2017 г.
 * Time: 18:13
 */

class ProjectsModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = 'projects';
    }

    public function create($employeeId,$name,$description,$endDate) {
        try{
            $this->db->beginTransaction();
            $stmt = $this->db->prepare("
                INSERT INTO `soft_uni`.`projects` (`name`, `description`, `end_date`) 
                VALUES (:name,:descr,:end_date) 
            ");
            $stmt->bindParam(':name',$name);
            $stmt->bindParam(':descr',$description);
            $stmt->bindParam(':end_date',$endDate);
            $stmt->execute();
            $projectId = $this->db->lastInsertId();

            $stmt = $this->db->prepare("
                INSERT INTO `employees_projects` (`employee_id`,`project_id`)
                VALUES (?,?)
            ");
            $stmt->bindParam(1,$employeeId);
            $stmt->bindParam(2,$projectId);
            $stmt->execute();

            $this->db->commit();

        } catch (PDOException $e){
            $this->db->rollBack();
            echo "Error:" .$e->getMessage();
        }
    }

    public function read($id){
        try{
            $stmt = $this->db->prepare("
            SELECT `em`.first_name,`em`.last_name,`pr`.name,`pr`.description,`pr`.start_date,`pr`.end_date
            FROM `employees_projects` AS `ep`
            INNER JOIN `employees` AS `em` ON `ep`.employee_id = :id and `em`.employee_id = :id
            INNER JOIN `projects` AS `pr`  ON  `pr`.project_id = `ep`.`project_id
            ");
            $stmt->bindParam('id',$id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch (PDOException $e){
            echo "Error:" .$e->getMessage();
        }
        return false;
    }
}