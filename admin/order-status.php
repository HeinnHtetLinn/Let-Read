<?php 
include("../vendor/autoload.php");
use Confs\Database\MySQL;
use Confs\Database\OrderTable;
use Confs\Router\HTTP;

$data=[
    'id' =>$_GET['id'],
    'status' =>$_GET['status']
];

$table = new OrderTable(new MySQL());
$table->update($data);

HTTP::redirect("/admin/orders.php");




