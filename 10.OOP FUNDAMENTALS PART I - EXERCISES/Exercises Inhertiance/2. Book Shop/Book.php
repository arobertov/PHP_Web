<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 12:04
 */
declare(strict_types = 1);
class Book
{
   protected $title;
   protected $author;
   protected $price;


    public function __construct($title, $author, $price)
    {
        $this->setTitle($title);
        $this->setAuthor($author);
        $this->setPrice($price);
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        if (strlen($title) < 3) {
            die("Title not valid!");
        }
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author)
    {
        $tokens = explode(' ', $author);
        preg_match('/^[a-zA-Z]+$/', trim($tokens[1]), $regex);
        if (count($regex) == 0) {
            die("Author not valid!");
        }
        $this->author = $author;
    }

    /**
     * @return float
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(int $price)
    {
        if ($price <= 0) {
            die("Price not valid!");
        }
        $this->price = $price;
    }

    public function __toString()
    {
        return "OK \n". $this->getPrice() ."\n";
    }
}