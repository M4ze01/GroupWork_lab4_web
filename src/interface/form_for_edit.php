<?php
require '..\..\vendor\autoload.php';
$product_id = $_GET['product_id'];
$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);
$query = $fluent->from('products')->where('id', $product_id)->fetch();

$name = $query['name'];
$amount = $query['amount'];
$price = $query['price'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <form action="../edit.php" method="post">

        <div class="wrapper">
            <div class="inner">
                <form action="">
                    <h3>Edit Product</h3>
                    <label class="form-group">
                        <input type="text" class="form-control" name="product_name" value="<?php echo $name ?>" required>
                        <span>Product name</span>
                        <span class="border"></span>
                    </label>
                    <label class="form-group">
                        <input type="text" class="form-control" name="product_id" value="<?php echo $product_id ?>" required>
                        <span for=""> Product ID</span>
                        <span class="border"></span>
                    </label>
                    <label class="form-group">
                        <input type="text" class="form-control" name="amount" value="<?php echo $amount ?>" required>
                        <span for=""> Amount</span>
                        <span class="border"></span>
                    </label>
                    <label class="form-group">
                        <input type="text" class="form-control" name="price" value="<?php echo $price ?>" required>
                        <span for=""> Price</span>
                        <span class="border"></span>
                    </label>
                    <button>EDIT
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>

    </form>
</body>

</html>