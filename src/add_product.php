<?php

require '..\vendor\autoload.php';

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);
if (isset($_POST)) {
    $product_name = $_POST['name'];
    $amount = (int)$_POST['amount'];
    $price = (int)$_POST['price'];
    $values = [
        'id' => '',
        'name' => $product_name,
        'user_id' => 1,
        'amount' => $amount,
        'price' => $price,
    ];

    $query = $fluent
        ->insertInto('products')
        ->values($values)
        ->execute();
    echo "product added successfully";
}

// $query = $fluent->insertInto('products', $values)->execute();
// 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hehe</title>
</head>

<body>

</body>

</html>