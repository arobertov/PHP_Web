<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 16.10.2017 г.
 * Time: 19:48
 */
$db = new PDO('mysql:host=localhost;dbname=php-cource','root','');
$db_stm = $db->prepare('INSERT INTO `students`(
                        first_name,last_name,student_number,phone
                        ) VALUES (
                        :firstname,:lastname,:studentNumber,:phone
                        )');

$db_stm->bindParam('firstname',$firstName);
$db_stm->bindParam('lastname',$lastName);
$db_stm->bindParam('studentNumber',$studNumber);
$db_stm->bindParam('phone',$phoneNumber);

while (1){
    $input = explode(' ',trim(fgets(STDIN)));
    if($input[0]=='End'){
        break;
    }
    if(count($input)==4){
        list($firstName,$lastName,$studNumber,$phoneNumber) = $input;
        $db_stm->execute();
    }elseif (count($input)==3){
        list($firstName,$lastName,$studNumber) = $input;
        $db_stm->execute();
    } else {
        echo "Please insert valid data ! \n";
    }

}