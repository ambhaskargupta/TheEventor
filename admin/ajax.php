<?php
session_start();
if(!empty($_SESSION['name']) && !empty($_SESSION['u_name'])){
    $logSts = "IN";
}else{
    $logSts = "OUT";
}

$folder = 'sources';
if(empty($_GET['sub']) && empty($_GET['page'])){
    $section = 'users';
    $page = 'login';
}else{
    $section = strtolower(trim($_GET['sub']));
    $page = strtolower(trim($_GET['page']));
}
include 'config/db_con.php';
include 'config/config.php';
include 'config/functions.php';
include 'config/messages.php';

if(!is_readable("$folder/$section/$page.php")){
    echo 'No Page Found';
}
else{
    include("$folder/$section/$page.php");
}
?>