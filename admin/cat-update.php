<?php 

include("../vendor/autoload.php");
use Confs\Database\CategoryTable;
use Confs\Database\MySQL;
use Confs\Router\HTTP;

$table = new CategoryTable(new MySQL());
$data = [
    "id" => $_POST['id'],
    "name" =>$_POST['name'],
    "remark" =>$_POST['remark'],
];


$table->update($data);
HTTP::redirect("/admin/cat-list.php")





?>