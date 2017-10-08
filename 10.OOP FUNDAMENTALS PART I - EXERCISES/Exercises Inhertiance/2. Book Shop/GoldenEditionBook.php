<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 12:29
 */
declare(strict_types = 1);
include ('Book.php');
class GoldenEditionBook extends Book
{
    public function getPrice(): int
    {
        return parent::getPrice() * 1.3;
    }
}