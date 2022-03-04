<?php 
include("../vendor/autoload.php");
use Confs\Database\CategoryTable;
use Confs\Database\MySQL;
use Confs\Auth\Authen;

Authen::check();

$table = new CategoryTable(new MySQL());
$categories = $table->getAll();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/button.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center text-white p-2 bg-black ">Category List</h1>
        <ul class="d-flex p-0">
            <li class="list-group-item bg-dark"><a class="text-white" href="book-list.php">Manage Books</a></li>
            <li class="list-group-item bg-dark"><a class="text-white" href="cat-list.php">Manage Categories</a></li>
            <li class="list-group-item bg-dark"><a class="text-white" href="orders.php">Manage Orders</a></li>
            <li class="list-group-item bg-dark"><a class="text-white" href="logout.php">Logout</a></li>
        </ul>
        <ul class="list-group p-5">

            <?php foreach ($categories as $category):?>         
                <li title="<?= $category->remark?>" class="list-group-item bg-dark text-white">
                <a class="btn btn-sm btn-outline-danger" href="cat-del.php?id=<?=$category->id?>" class="del">DEL</a>
                <a class="btn btn-sm btn-outline-warning" href="cat-edit.php?id=<?=$category->id?>" class="edit">EDIT</a>  
                <?= $category->name ?>
                </li>
            <?php endforeach ?>
        </ul>
        <a class="mx-5 btn btn-sm btn-primary"  href="cat-new.php">New Category</a>
    </div>
    
</body>
</html>