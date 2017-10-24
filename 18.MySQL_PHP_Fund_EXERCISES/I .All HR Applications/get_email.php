<?php
include ('Employee.php');
include ('db_config.php');

$input = explode(',',trim(fgets(STDIN)));
if(count($input)>3 || count($input)<3 || $input[0]!='Info'){
    die('Invalid input data');
}
try {
    $employee = new Employee($db);
    $result = $employee->getEmail($input[1], $input[2]);
    $id = -1;
    foreach ($result as $colon => $row) {
        if ($id != -1 && $id != $row['id'])
            echo "---------------------------- \n";
        if ($id == $row['id']) {
            printEmail($row);
        } else {
            echo "{$row['id']},{$row['first_name']},{$row['middle_name']},{$row['last_name']},{$row['department']},{$row['position']}\n";
            printEmail($row);
        }

        $id = $row['id'];
    }
} catch (Exception $e){
    $e->getMessage();
}
function isEmail($email){
    if($email!=null){
        return true;
    }
    return false;
}

function printEmail($row){
    if(isPhone($row['work_email']))
        echo "work:{$row['work_email']}";
    if (isPhone($row['personal_email'])) {
        echo " ,personal:{$row['personal_email']} \n";
    }else {
        echo "\n";
    }
}