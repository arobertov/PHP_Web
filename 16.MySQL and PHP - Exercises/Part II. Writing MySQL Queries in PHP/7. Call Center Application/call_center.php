<?php
include ('geography_db.php');
include ('mypdo.php');

while (1) {
    $input = trim(fgets(STDIN));
    if($input == 'Bye'){
        echo 'Good bye!';
    }
    try {
        $db = new MyPDO("mysql:dbname=$db_name;host=$db_host", $db_user,
            $db_password);
        $db->setErrorException(); // Throw exception on all errors

        $db_stm = $db->prepare("SELECT `country_name`,`capital` FROM `countries`
                            WHERE `country_code` = :input OR `iso_code` = :input OR `country_name`= :input"
        );
        $db_stm->bindParam('input', $input);
        if ($db_stm->execute() && $db_stm->rowCount()>0){
            while ($row = $db_stm->fetch(PDO::FETCH_ASSOC)) {
                echo 'Country: ' . $row['country_name'] . PHP_EOL;
                echo 'Capital: ' . $row['capital'] . PHP_EOL;
            }
        }else echo "N\A \n";
        $continents = null; // Close connection
        $db = null;
    } catch (PDOException $e) {
        print "PDO Error: " . $e->getMessage() . "<\br>";
    }
}

