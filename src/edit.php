<?php

require '..\vendor\autoload.php';
$amount = $_POST['amount'];
$product_name = $_POST['product_name'];
$price = $_POST['price'];
$product_id = $_POST['product_id'];


$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);
$set = array(
    'name' => $product_name,
    'amount' => $amount,
    'price' => $price,
);

$query = $fluent->update('products')->set($set)->where('id', $product_id)->execute();
