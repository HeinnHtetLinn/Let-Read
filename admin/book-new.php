<?php 
include("../vendor/autoload.php");
use Confs\Database\CategoryTable;
use Confs\Database\MySQL;

$table = new CategoryTable(new MySQL());
$all = $table->getAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Book</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <h1 class="text-center">New Book</h1>
    <form class="form-group p-5" action="book-add.php" method="post" enctype="multipart/form-data">
        <label class="form-label" for="title">Book Title</label>
        <input class="form-control" type="text" name="title" id="title">

        <label class="form-label" for="author">Author</label>
        <input class="form-control" type="text" name="author" id="author">

        <label class="form-label" for="summary">Summary</label>
        <textarea class="form-control" name="summary" id="summary"></textarea>

        <label class="form-label" for="price">Price</label>
        <input class="form-control" type="text" name="price" id="price">

        <label class="form-label" for="categories">Category</label>
        <select class="form-select" name="category_id" id="categories">
            <option value="0">--Choose--</option>
            <?php foreach($all as $category) :?>
                <option value="<?= $category->id ?>">
                    <?= $category->name ?>
                </option>
            <?php endforeach ?>
        </select>

        <label class="form-label" for="cover">Cover</label>
        <input class="form-control" type="file" name="cover" id="cover">

        <br><br>
        <input class="btn btn-sm btn-primary me-3" type="submit" value="Add Book +">
        <a  href="book-list.php" class="back btn btn-sm btn-outline-secondary">Back</a>
    </form>
</body>
</html>