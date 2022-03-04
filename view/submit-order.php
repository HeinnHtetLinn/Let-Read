
<?php
include("../vendor/autoload.php");
use Confs\Auth\Authen;
use Confs\Database\OrderTable;
use Confs\Database\OrderItemTable;
use Confs\Database\MySQL;

Authen::check();

$data = [
    'name' => $_POST['name'],
    'email' =>$_POST['email'],
    'phone' =>$_POST['phone'],
    'address' =>$_POST['address']
];

$table = new OrderTable(new MySQL());
$datas = $table->insert($data);

$order_id = $datas;
foreach($_SESSION['cart'] as $id =>$qty){
    $table = new OrderItemTable(new MySQL());
    $table->insert($id,$order_id,$qty);
}
unset($_SESSION['cart']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Submitted</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
    <!-- <link rel="stylesheet" href="./css/style.css"> -->
</head>
<body>
    <h1 class="bg-success p-2 m-0">Order Submitted</h1>

    <div class="bg-success p-1">
        Your order has been submitted.We'll deliver the item soon.
        <a href="index.php" class="done">Book Store Home</a>
    </div>
    <div class="footer bg-dark p-2 text-white-50 text-center">
        &copy; <?= date("Y") ?>. All right reserved.
    </div>
</body>
</html>

