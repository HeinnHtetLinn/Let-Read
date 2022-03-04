<?php
session_start();
include("../vendor/autoload.php");
use Confs\Database\BookTable;
use Confs\Database\MySQL;
use Confs\Auth\Authen;
use Confs\Database\CategoryTable;

// Authen::check();

$cart = 0;
if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $qty){
        $cart += $qty;
    }
}

if(isset($_GET['cat'])){
    $cat_id = $_GET['cat'];
    $table = new BookTable(new MySQL());
    $books = $table->findByCatId($cat_id); 

}else{
    $table = new BookTable(new MySQL());
    $books = $table->getAll();
}
// $table = new BookTable(new MySQL());
// $books = $table->getAll();



$table = new CategoryTable(new MySQL());
$cats = $table->getAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Store</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
</head>
<body>
    <h1 class="text-center">Let Read Book-Store</h1>
    <div class="text-end bg-primary p-2">
        <a class="text-white" style="text-decoration: none;" href="view-cart.php">(<?= $cart ?>) books in your cart</a>
        <?php if(isset($_SESSION['auth'])) : ?>
        <a class="text-white btn btn-warning" href="../admin/index.php">Go to Admin Panel</a>
        <?php endif ;?>
    </div>
    <div class="container-fluid overflow-hidden">
        <div class="row">
            <div class="col-md-2 col-sm-2 p-0 bg-dark d-none d-sm-block d-lg-block ">
                <div class="sidebar text-center">
                    <ul class="list-group">
                        <li class="list-group-item p-0 bg-dark text-white-50">
                            <b><a class="btn list-group-item-action" href="index.php">All Categories</a></b>
                        </li>
                        <?php foreach($cats as $cat) :?>
                        <li class="list-group-item p-0 bg-dark text-white-50">
                            <a class="btn list-group-item-action" href="index.php?cat=<?= $cat->id ?>">
                            <?= $cat->name ?>
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-10 col-sm-10">
                    <div class="row g-2 overflow-hidden">
                        <?php foreach($books as $book) :?> 
                        <div class="col-md-3 col-sm-4 col-6 col-lg-2   py-3 px-0 clearfix">
                            <div class="card px-2 border-0">
                                <img src="../admin/covers/<?= $book->cover ?>" alt="book-cover" height="200">
                                <div class="card-body text-start">
                                    <b class="d-block pt-2 text-start">
                                            <a style="text-decoration: none;" class="text-black" href="book-detail.php?id=<?= $book->id ?>">
                                                <?= $book->title ?>
                                            </a>
                                        </b>
                                        <i style="color: #E74C3C;">$<?= $book->price ?> </i>
                                        
                                    
                                    <a href="add-to-cart.php?id=<?= $book->id ?>" class="btn btn-sm btn-primary d-block">
                                            Add to Cart
                                    </a>
                                </div>    
                                
                            </div>
                        </div>
                                
                        
                        <?php endforeach ?>
                    </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="d-flex pt-0 bg-dark" style="width: 100%;">
        
        <div class="main bg-black" style="width: 85%">
        
            
                
        </div>
    </div> -->
    
    <div class="footer text-center bg-dark bg-opacity-75 text-white p-3">
        &copy; <?= date("Y") ?>.All right reserved.
    </div>
</body>
</html>