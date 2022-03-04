<?php
include("../vendor/autoload.php");
use Confs\Router\HTTP;

    session_start();
    unset($_SESSION['cart']);

    HTTP::redirect("./view/index.php");


?>