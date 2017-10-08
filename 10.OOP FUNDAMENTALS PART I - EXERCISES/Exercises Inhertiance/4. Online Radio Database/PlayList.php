<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 19:49
 */

class PlayList
{

    private $songs;
    private $length;
    private $songCount;

    /**
     * PlayList constructor.
     * @param $songs
     * @param $length
     */
    public function __construct(array  $songs)
    {
        $this->setSongs($songs);
        $this->setSongCount ($songs);
        $this->setLength($songs);
    }

    /**
     * @return mixed
     */
    public function getSongCount()
    {
        return $this->songCount;
    }

    /**
     * @param mixed $songCount
     */
    public function setSongCount($songs)
    {
        $songCount = count($songs);
        $this->songCount = $songCount;
    }

    /**
     * @return array
     */
    public function getSongs()
    {
        return $this->songs;
    }

    /**
     * @param array $songs
     */
    public function setSongs($songs)
    {
        $this->songs = $songs;
    }

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($songs)
    {
        $hour = 0;
        $min = 0;
        $sec = 0;
        foreach ($songs as $song){
            $arr = explode(':',$song->getMinuteSeconds());
            $min += $arr[0];
            $sec += $arr[1];
            if($min>60){
                $hour+=1;
            }
            if($sec>60){
                $sec-=60;
                $min+=1;
            }

        }
        $length = $hour.'h '.str_pad($min,2,0).'min '.str_pad($sec,2,0).'s ' ;
        $this->length = $length;
    }

    public function __toString()
    {
        return
            "Songs added: ".$this->getSongCount().
            "\nPlaylist length: ". $this->getLength()."\n";
    }
}