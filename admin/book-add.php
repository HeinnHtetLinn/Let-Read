<?php 
    include("../vendor/autoload.php");
    use Confs\Database\BookTable;
    use Confs\Database\CategoryTable;
    use Confs\Database\MySQL;
    use Confs\Router\HTTP;

    $data = [
        'title'=> $_POST['title'],
        'author'=>$_POST['author'],
        'summary'=>$_POST['summary'],
        'price'=>$_POST['price'],
        'category_id'=>$_POST['category_id'],
        'cover'=>$_FILES['cover']['name']
    ];
    $tmp = $_FILES['cover']['tmp_name'];
    $name = $_FILES['cover']['name'];

    if($name){
        move_uploaded_file($tmp , "./covers/$name");
    }

    $table =new BookTable(new MySQL());
    $table->insert($data);

    HTTP::redirect("/admin/book-list.php");


?>