<?php 
include("../vendor/autoload.php");
use Confs\Router\HTTP;
    session_start();
    $id = $_GET['id'];
    $_SESSION['cart'][$id]++;

    HTTP::redirect("./view/index.php");

