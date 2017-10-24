<?php
include "db_config.php";
$result = $db->query('CALL GetAllStudents()', PDO::FETCH_ASSOC);
foreach ($result as $row) {
    echo "{$row['Names']}, {$row['student_number']}, {$row['course_name']} \n";
}
