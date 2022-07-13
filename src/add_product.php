<?php
session_start();
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
        'user_id' => (int)$_SESSION['userID'],
        'amount' => $amount,
        'price' => $price,
    ];

    $query = $fluent->insertInto('products')
        ->values($values)
        ->execute();
    echo "product added successfully";
    header('Location:interface');
}

// $query = $fluent->insertInto('products', $values)->execute();
// 
?>
