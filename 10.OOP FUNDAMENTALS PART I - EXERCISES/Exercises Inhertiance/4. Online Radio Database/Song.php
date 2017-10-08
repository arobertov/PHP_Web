<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 18:44
 */
include ('InvalidSongException.php');
class Song{
    private $artistName;
    private $songName;
    private $minuteSeconds;

    /**
     * Song constructor.
     * @param $artistName
     * @param $songName
     * @param $minuteSeconds
     */
    public function __construct(string $artistName,string $songName,string $minuteSeconds)
    {
        $this->setArtistName($artistName);
        $this->setSongName($songName);
        $this->setMinuteSeconds($minuteSeconds);
    }


    /**
     * @return mixed
     */
    public function getArtistName()
    {
        return $this->artistName;
    }

    /**
     * @param mixed $artistName
     */
    public function setArtistName($artistName)
    {
        if(strlen($artistName) < 3 || strlen($artistName) > 20 ){
            throw new InvalidArtistNameException("Artist name should be between 3 and 20 symbols. \n");
        }
        $this->artistName = $artistName;
    }

    /**
     * @return mixed
     */
    public function getSongName()
    {
        return $this->songName;
    }

    /**
     * @param mixed $songName
     */
    public function setSongName($songName)
    {
        if(strlen($songName )< 3 || strlen($songName) > 30){
            throw new InvalidSongNameException("Song name should be between 3 and 30 symbols. \n");
        }
        $this->songName = $songName;
    }

    /**
     * @return mixed
     */
    public function getMinuteSeconds()
    {
        return $this->minuteSeconds;
    }

    /**
     * @param mixed $minuteSeconds
     */
    public function setMinuteSeconds($minuteSeconds)
    {
        $arr = explode(':',$minuteSeconds);
        $minute = intval($arr[0]);
        $second = intval($arr[1]);
        if($minute<0||$minute>=14){
            throw new InvalidSongMinutesException("Song minutes should be between 0 and 14. \n");
        }elseif ($second<0||$second>59){
            throw new InvalidSongSecondsException("Song seconds should be between 0 and 59. \n");
        }
        $this->minuteSeconds = $minuteSeconds;
    }

}