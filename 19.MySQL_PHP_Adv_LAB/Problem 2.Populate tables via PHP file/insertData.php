<?php
include "db_config.php";
include "InsertDatabaseTransaction.php";

$insertTransaction = new InsertDatabaseTransaction($db);

while (1){
    try {
        // input contain format : <First_name> <Last_name> <Student_number> <CourseName> //
        $input = explode(' ', trim(fgets(STDIN)));
        if ($input[0] == 'End') {
            die('Goodbye :) !');
        }
        if (count($input) > 4 || count($input) < 4) {
            echo "Invalid data input place try again: ";
        }
        list($firstName, $lastName, $studentNumber, $courseName) = $input;
        $insertTransaction->insertData($firstName, $lastName, $studentNumber, $courseName);


    } catch (Exception $e){
        echo $e->getMessage().PHP_EOL;
    }
}