<?php 

include("../vendor/autoload.php");
use Confs\Database\CategoryTable;
use Confs\Database\MySQL;
use Confs\Router\HTTP;

$data=[
    "name" =>$_POST['name'],
    "remark" =>$_POST['remark'],
];

$table = new CategoryTable(new MySQL());

if($table){
    $table->insert($data);
    HTTP::redirect("/admin/cat-list.php");
}

