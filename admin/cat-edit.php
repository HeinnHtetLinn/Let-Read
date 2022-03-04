<?php
include("../vendor/autoload.php");
use Confs\Database\CategoryTable;
use Confs\Database\MySQL;
use Confs\Router\HTTP;
$table = new CategoryTable(new MySQL());
$id= $_GET['id'];
$ids = $table->findById($id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
<link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <h1 class="text-center">Edit Category</h1>

    <form action="cat-update.php"  method="post" class="form-group p-5">
        <input type="hidden" class="form-control" name="id" value="<?= $ids->id ?>">

        <label for="name">Category Name</label>
        <input type="text" class="form-control my-3" name="name" id="name" value="<?=$ids->name ?>">

        <label for="remark">Remark</label>
        <textarea class="form-control my-3" name="remark" id="remark"><?= $ids->remark ?></textarea>
        <br><br>
        <input type="submit" class="btn btn-primary" value="Update Category">
    
    </form>
</body>
</html>