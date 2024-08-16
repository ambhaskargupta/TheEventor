<?php
include 'config.php';
if(!empty($_GET['page'])){
    $page = $_GET['page'];
    if(!is_readable("$page.php")){
        include("../admin/no-page.php");
    }
    else{
    include("$page.php");;
    }
}
?>

