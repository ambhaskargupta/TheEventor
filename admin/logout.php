<?php
session_start();
session_unset();
session_destroy();
$url = 'index.php';
header("location:$url");
exit();
?>