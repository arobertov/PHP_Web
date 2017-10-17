<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 16.10.2017 г.
 * Time: 21:58
 */
$id = trim(fgets(STDIN));

$db = new PDO('mysql:host=localhost;dbname=php-cource','root','');
$db_stm = $db->prepare('DELETE FROM `students` WHERE `ID`= ?');

$db_stm->execute(array($id));