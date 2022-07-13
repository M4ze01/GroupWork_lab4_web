<?php
    require '..\..\vendor\autoload.php';
    $product_id = $_GET['product_id'];
    $pdo = new PDO('mysql:dbname=learningphp', 'root', '');
    $fluent = new Envms\FluentPDO\Query($pdo);
    $query = $fluent->from('products')->where('id',$product_id)->fetch();

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
    <title>Document</title>
</head>

<body>
    <form action="../edit.php" method="post">
        <div>
            <input type="text" placeholder="Product Name" name="product_name"value="<?php echo $name?>"><br>
        </div>
        <input type="text" placeholder="Product ID" name="product_id" value="<?php echo $product_id?>">
        <input type="text" placeholder="Amount" name="amount"value="<?php echo $amount?>"><br>
        <input type="text" placeholder="Price" name="price"value="<?php echo $price?>"><br>
        <input type="submit" name="submit">

    </form>
</body>

</html>