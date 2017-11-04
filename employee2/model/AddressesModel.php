<?php

class AddressesModel extends Model
{

    public function read($id){
       try{
           $stmt = $this->db->prepare("
                SELECT CONCAT(`em`.`first_name`,' ',`em`.`last_name`) AS `names`,`adr`.`address_text`,`tw`.`name` AS `town_name` 
                FROM `employees` as `em`
                INNER JOIN `addresses` AS `adr` ON `em`.address_id = `adr`.address_id AND `em`.employee_id = :id
                INNER JOIN `towns` as `tw` ON `tw`.town_id = `adr`.town_id
           ");
           $stmt->bindParam('id',$id);
           $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $result;
       } catch (PDOException $e){
           echo 'Error:'. $e->getMessage().'<br/>';
       } return false;
    }

    public function update($address,$id){
        try{
            $stmt = $this->db->prepare("
                   UPDATE `soft_uni`.`addresses` 
                   SET `address_text`=:address 
                   WHERE  `address_id`=:id
            ");
            $stmt->bindParam('address',$address);
            $stmt->bindParam('id',$id);
            $stmt->execute();
        }catch (PDOException $e){
            echo 'Error:'. $e->getMessage().'<br/>';
        } return false;

    }

    public function readAll(){
        try{
            $stmt = $this->db->prepare("
                    SELECT * FROM `addresses`
           ");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e){
            echo 'Error:'. $e->getMessage().'<br/>';
        } return false;
    }
}