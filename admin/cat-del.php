<?php 
include("../vendor/autoload.php");
use Confs\Database\CategoryTable;
use Confs\Database\MySQL;
use Confs\Router\HTTP;

$table = new CategoryTable(new MySQL());

$id = $_GET['id'];
$table->delete($id);

HTTP::redirect("/admin/cat-list.php");
