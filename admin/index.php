<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../admin/css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center">
            Login To Book Store Adminstration
        </h1>
        <form action="login.php" class="form-group px-sm-5" method="POST">
            <label class="form-label" for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name">

            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control" name="password" id="password">

            <br><br>
            <input class="btn btn-sm btn-primary" type="submit" value="Admin Login">
        </form>
    </div>
    
</body>
</html>