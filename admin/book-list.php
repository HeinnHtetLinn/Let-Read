<?php

include("../vendor/autoload.php");
use Confs\Database\CategoryTable;
use Confs\Database\BookTable;
use Confs\Database\MySQL;
use Confs\Auth\Authen;

Authen::check();

$table = new BookTable(new MySQL());
$books = $table->getAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book List</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <div class="container-fluid p-0 bg-black">
        <h1 class="text-center text-white">Book List</h1>
        <ul class="d-flex m-0 p-0 bg-dark rounded">
            <li style="list-style: none;"><a class="btn list-group-item-action"  href="book-list.php">Manage Books</a></li>
            <li style="list-style: none;"><a class="btn list-group-item-action" href="cat-list.php">Manage Categories</a></li>
            <li style="list-style: none;"><a class="btn list-group-item-action" href="orders.php">Manage Orders</a></li>
            <li style="list-style: none;"><a class="btn list-group-item-action" href="logout.php">Logout</a></li>
        </ul>
        <ul class="list-group rounded-0 px-2">
            <?php foreach ($books as $book):?>
                <li class="list-group-item list">
                    <img src="./covers/<?= $book->cover ?>" alt="cover-img" class="rounded" align="right" height="140">
                    <b><?=$book->title?></b>
                    <i>By<?=$book->author ?></i>
                    <small>(in <?=$book->name ?>)</small>
                    <span>$<?=$book->price?></span>
                    <div><?=$book->summary ?></div>
                    <br>
                    <a href="book-del.php?id=<?=$book->id?>" class="btn btn-sm btn-danger">DEL</a>
                    <a href="book-edit.php?id=<?=$book->id ?>" class="btn btn-sm btn-warning">EDIT</a>
                </li>
                
            <?php endforeach ?>
        </ul>

        <a href="book-new.php" class="btn btn-sm btn-success m-2">New Book</a>
    </div>
    

</body>
</html>