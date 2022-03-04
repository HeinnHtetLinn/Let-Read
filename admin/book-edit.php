<?php 
include("../vendor/autoload.php");
use Confs\Database\BookTable;
use Confs\Database\CategoryTable;
use Confs\Database\MySQL;

$id = $_GET['id'];
$table = new BookTable(new MySQL());
$ids = $table->findById($id);

$cattable = new CategoryTable(new MySQL());
$categories = $cattable->getAll();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book-Edit</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <h1 class="text-center">Book Edit</h1>
    <div class="container">
        <form class="form-group p-5 bg-dark text-white rounded-2" action="book-update.php" method="post" enctype="multipart/form-data">
            
            <input type="hidden" name="id" value="<?= $ids->id ?>">
            
            <label class="form-label text-white-50" for="title">Book Title</label>
            <input class="form-control" type="text" name="title" id="title" value="<?= $ids->title ?>">

            <label for="author" class="form-label text-white-50">Author</label>
            <input class="form-control" type="text" name="author" id="author" value="<?= $ids->author ?>">

            <label for="summary" class="form-label text-white-50">Summary</label>
            <textarea class="form-control" name="summary" id="summary"><?= $ids->summary ?></textarea>

            <label for="price" class="form-label text-white-50">Price</label>
            <input class="form-control" type="text" name="price" id="price" value="<?= $ids->price ?>">

            <label for="categories" class="form-label text-white-50">Category</label>
            <select class="form-select" name="category_id" id="categories">
                <option value="0">--Choose--</option>
                <?php foreach($categories as $category) :?>
                    <option value="<?= $category->id ?>">
                        <?php if($category->id == $ids->category_id) :?>
                            <?= "selected" ?>
                        <?php endif  ?>
                        <?= $category->name ?>
                    </option>
                <?php endforeach ?>
            </select>
            <br><br>
            <img src="./covers/<?= $ids->cover ?>" alt="cover-img" height="150">
            <label class="form-label text-white-50" for="cover">Change Cover</label>
            <input class="form-control" type="file" name="cover" id="cover">
            <br><br>
            <input class="btn btn-sm btn-primary" type="submit" value="Update Book">
            <a href="book-list.php">Back</a>
        </form>
    </div>
    
</body>
</html>