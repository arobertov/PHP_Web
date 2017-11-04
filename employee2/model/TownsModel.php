<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 3.11.2017 г.
 * Time: 11:47
 */

class TownsModel extends Model
{
    public function read(){
        try{
           $stmt = $this->db->prepare("
                    SELECT * FROM `towns`
           ");
           $stmt->execute();
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
           return $result;
        } catch (PDOException $e){
            echo 'Error:'. $e->getMessage().'<br/>';
        } return false;
    }

    public function update($town,$id){
        try{
            $stmt = $this->db->prepare("
                UPDATE `soft_uni`.`towns` 
                SET `name`=:name 
                WHERE  `town_id`=:id;
            ");
            $stmt->bindParam('name',$town);
            $stmt->bindParam('id',$id);
            $stmt->execute();
        } catch (PDOException $e){
            echo 'Error:'. $e->getMessage().'<br/>';
        } return false;
    }
}