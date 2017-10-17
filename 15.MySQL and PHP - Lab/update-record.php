<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 16.10.2017 г.
 * Time: 20:58
 */
$input = explode(' ',trim(fgets(STDIN)));
$id = $input[0];
$param = '`'.$input[1].'`';
$val = $input[2];

$db = new PDO('mysql:host=localhost;dbname=php-cource','root','');

$db_stm = $db->prepare('UPDATE `students` SET '.$param.' = :val WHERE `ID`= :id ');

$db_stm->bindParam('id',$id);
//$db_stm->bindParam('param',$param);
$db_stm->bindParam('val',$val);

$db_stm->execute();
