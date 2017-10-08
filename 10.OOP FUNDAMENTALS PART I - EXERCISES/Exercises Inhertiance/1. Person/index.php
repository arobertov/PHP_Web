<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 10:44
 */

include('Child.php');
try {
    $child = new Child('Acho',14);
    echo $child->getName() . " " . $child->getAge() . "\n";
}
catch (Exception $e){
    echo $e->getMessage();
}