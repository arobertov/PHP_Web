<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 12:33
 */
declare(strict_types = 1);
include ('GoldenEditionBook.php');

$author = trim(fgets(STDIN));
$title = trim(fgets(STDIN));
$price = intval(trim(fgets(STDIN)));
$bookType = trim(fgets(STDIN));

if($bookType == 'STANDARD'){
    $standard = new Book( $title , $author , $price );
    echo $standard;
} elseif ($bookType == 'GOLD') {
    $gold = new GoldenEditionBook($title , $author , $price);
    echo $gold;
} else echo 'Bad command !';