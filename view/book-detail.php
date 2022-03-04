<?php
include("../vendor/autoload.php");
use Confs\Auth\Authen;
use Confs\Database\BookTable;
use Confs\Database\MySQL;
Authen::check();


$id = $_GET['id'];

$table = new BookTable(new MySQL());
$book = $table->findById($id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Detail</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <h1 class="text-center">Book Detail</h1>
    <a class="btn btn-outline-info btn-sm float-end" href="index.php">&laquo; Go Back</a>
    <div class="detail p-3">
        
        <img src="../admin/covers/<?= $book->cover ?>" alt="book-cover">
        <h2 class="my-2"><?= $book->title ?></h2>
        <i>by<?= $book->author ?></i>
        <b>$<?= $book->price ?></b>
        <p><?= $book->summary ?></p>
        <a href="add-to-chart.php?<?=$book->id?>" class="btn btn-sm btn-info">
            Add to Cart
        </a>
    </div>
    <div class="footer bg-dark p-3 text-white text-center">
        &copy;<?=date("Y") ?>. All right reserved.
    </div>
</body>
</html>