<?php
include("../vendor/autoload.php");
use Confs\Auth\Authen;
use Confs\Router\HTTP;
use Confs\Database\BookTable;
use Confs\Database\MySQL;


Authen::check();
if(!isset($_SESSION['cart'])){
    HTTP::redirect("./view/index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart View</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
</head>
<body class="bg-dark">
    <h1 class="text-start p-2 text-white">View Cart</h1>
    <div class="d-flex">
        <div class="sidebar" style="width: 20%; height:100%">
            <ul class="list-group text-center">
                <li class="bg-dark list-group-item p-0 rounded-0"><a href="index.php" class="text-primary-50 p-2 btn list-group-item-action">&laquo; Continue Shopping</a></li>
                <li class="bg-dark list-group-item p-0 rounded-0"><a href="clear-cart.php" class="text-danger p-2 btn list-group-item-action">&times; Clear Cart</a></li>
            </ul>
        </div>
        <div class="main bg-light p-3" style="width: 80%;">
            <table class="table table-dark table-hover">
                <tr>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Price</th>
                </tr>
                <?php 
                $total = 0;
                foreach($_SESSION['cart'] as $id=>$qty): 
                    $table = new BookTable(new MySQL());
                    $row = $table->findById($id);
                    $total += $row->price * $qty;
                ?>
                <tr>
                    <td><?= $row->title ?></td>
                    <td><?= $qty ?></td>
                    <td>$<?= $row->price ?></td>
                    <td>$<?= $row->price * $qty ?></td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="3" align="right"><b>Total:</b></td>
                    <td>$<?= $total; ?></td>
                </tr>
            </table>

            <div class="order-form p-5">
                <h2 class="text-center">Order Now</h2>
                <form class="form-group" action="submit-order.php" method="POST">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control" cols="30" rows="10"></textarea>
                    <br><br>
                    <input type="submit" class="btn btn-sm btn-success" value="Submit Order">
                    <a href="index.php">Continue Shopping</a>
                
                </form>
            </div>

        </div>
    </div>
    <div class="footer p-3 bg-black text-white-50 text-center">
        &copy; <?= date('Y') ?>. All right reserved.

    </div>
</body>
</html>