<?php
/**
 * Created by PhpStorm.
 * User: AngelRobertov
 * Date: 8.10.2017 г.
 * Time: 18:51
 */
include ('Song.php');
include ('PlayList.php');
$counter = trim(fgets(STDIN));
$songs = [];

for($i=0;$i<$counter;$i++) {
    try {
        $input = explode(';', trim(fgets(STDIN)));
    } catch (TypeError $e){
        echo $e->getMessage('Invalid song.');
    }
    try {
        $songs[] = $song = new Song($input[0], $input[1], $input[2]);
        echo 'Song added.'. "\n";
    } catch (Exception $e) {
        echo $e->getMessage();
    }


}
$playlist= new PlayList($songs);
echo $playlist;
