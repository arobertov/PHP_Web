<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbase = 'test';
$db = new PDO("mysql:dbname=$dbase;host=$host", $username, $password);