<?php
#CONNECTION FILE
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'root123';
$dbname = 'eventor';

$dsn = 'mysql:dbname=' . $dbname . ';host=' . $dbhost . ';port=3306';
try {
    $pdocon = new PDO($dsn, $dbuser, $dbpass);
}
catch (PDOException $e) {
    die('Error ocured. Please try after some time');
}
?>