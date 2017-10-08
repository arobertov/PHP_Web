<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 18:34
 */

class InvalidSongException extends Exception {

}

class InvalidArtistNameException extends InvalidSongException {

}

class InvalidSongNameException extends InvalidSongException {

}

class InvalidSongLengthException extends InvalidSongException {

}

    class InvalidSongMinutesException extends InvalidSongLengthException {

    }

    class InvalidSongSecondsException extends InvalidSongLengthException {

    }
