<?php
include("../vendor/autoload.php");
use Confs\Auth\Authen;
use Confs\Database\OrderTable;
use Confs\Database\MySQL;
use Confs\Database\OrderItemTable;
Authen::check();
$table = new OrderTable(new MySQL());
$orders = $table->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order List</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <h1 class="p-3 bg-black text-white m-0">Order List</h1>
    <ul class="list-group flex-row bg-dark rounded-0">
        <li style="list-style: none;"><a href="book-list.php" class="btn list-group-item-action">Manage Books</a></li>
        <li style="list-style: none;"><a href="cat-list.php" class="btn list-group-item-action">Manage Categories</a></li>
        <li style="list-style: none;"><a href="orders.php" class="btn list-group-item-action">Manage Orders</a></li>
        <li style="list-style: none;"><a href="logout.php" class="btn list-group-item-action">Logout</a></li>
    </ul>
    <ul class="orders list-group p-3">
        <?php foreach($orders as $order) :?>
            <?php if($order->status) :?>
                <li class="delivered list-group-item">
            <?php else :?>
                <li class="list-group-item d-flex">
            <?php endif; ?>
                    <div class="order" style="width: 50%;">
                        <?php if($order->status) :?>
                            <b><strike><?= $order->name ?></strike></b>
                            <i class="d-block"><strike><?= $order->email ?></strike></i>
                            <span class="d-block"><strike><?= $order->phone ?></strike></span>
                            <p><strike><?= $order->address ?></strike></p>
                        
                        <a class="btn btn-sm btn-danger" href="order-status.php?id=<?= $order->id?>&status=0">Undo</a>
                        <?php else :?>
                            <b><?= $order->name ?></b>
                            <i class="d-block"><?= $order->email ?></i>
                            <span class="d-block"><?= $order->phone ?></span>
                            <p><?= $order->address ?></p>
                         <a class="btn btn-sm btn-info" href="order-status.php?id=<?= $order->id ?>&status=1">Mark as Delivered</a>
                        <?php endif ;?>
                    </div>
                    <div class="items" style="width: 50%;">
                        <?php
                            $id = $order->id;
                            $data = new OrderItemTable(new MySQL());
                            $items = $data->findByid($id);
                            // print_r($item);
                        ?>
                        <?php foreach($items as $item) :?>
                        <b class="d-block">
                            Book Name : <a href="../view/book-detail.php?id=<?= $item->book_id ?>">
                                <?= $item->title ?>
                            </a>
                               <p>Quantity : <?= $item->qty ?></p> 
                        </b>
                        <?php endforeach ?>
                    </div>
                </li>
        <?php endforeach ?>
                
    </ul>
</body>
</html>