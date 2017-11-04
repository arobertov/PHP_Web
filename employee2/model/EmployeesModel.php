<?php

class EmployeesModel extends Model
{
    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = 'employees';
    }

    public function readAll(){
        try {
            $stmt = $this->db->prepare("
                SELECT * FROM `{$this->table}`
        ");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e){
            echo 'Error:'. $e->getMessage().'<br/>';
        } return false;
   }

   public function readEmployee($employeeId){
       try {
           $stmt = $this->db->prepare("
                SELECT * FROM `{$this->table}`
                WHERE `employee_id`=:employee_id
        ");
           $stmt->bindParam('employee_id',$employeeId);
           $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $result;
       } catch (PDOException $e){
           echo 'Error:'. $e->getMessage().'<br/>';
       } return false;
   }

   public function updateAddress($addressId,$employeeId){
        try{
            $stmt = $this->db->prepare(" 
                UPDATE `soft_uni`.`employees` 
                SET `address_id`=:address_id
                WHERE  `employee_id`=:employee_id;
        ");
            $stmt->bindParam('address_id',$addressId);
            $stmt->bindParam('employee_id',$employeeId);
            $stmt->execute();
        } catch (PDOException $e){
            echo 'Error:'. $e->getMessage().'<br/>';
        } return false;
   }

}