<?php
include("../vendor/autoload.php");
use Confs\Router\HTTP;

session_start();
unset($_SESSION['auth']);
HTTP::redirect("/admin/index.php");