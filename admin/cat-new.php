<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <h1 class="text-center">New Category</h1>

    <form action="cat-add.php" class="form-group p-5" method="post">
        <label for="name">Category Name</label>
        <input type="text" class="form-control" name="name" id="name" value="">

        <label for="remark">Remark</label>
        <textarea name="remark" class="form-control" id="remark"></textarea>

        <br><br>
        <input type="submit" class="btn btn-primary" value="Add Category">
    </form>
</body>
</html>