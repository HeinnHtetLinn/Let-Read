<?php 

include("../vendor/autoload.php");
use Confs\Database\BookTable;
use Confs\Database\MySQL;
use Confs\Router\HTTP;

$id = $_GET['id'];
$table = new BookTable(new MySQL());

$table->delete($id);

HTTP::redirect("./admin/book-list.php")

?>