<?php
include("../vendor/autoload.php");
use Confs\Router\HTTP;

session_start();
$name = $_POST['name'];
$password = $_POST['password'];

if($name == "admin" && $password == '123456'){
    $_SESSION['auth'] = true;
    HTTP::redirect("/admin/book-list.php");
}else{
    HTTP::redirect("/admin/index.php");
}