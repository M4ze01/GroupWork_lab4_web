<?php

require '..\vendor\autoload.php';

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);
$set = array(
    'name' => 'content1',
    'user_id' => 1,
    'amount' => 20,
    'price' => 20,
);

$query = $fluent->update('products')->set($set)->where('id', 1)->execute();
