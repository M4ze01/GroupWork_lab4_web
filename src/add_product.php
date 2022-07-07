<?php

require '..\vendor\autoload.php';

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);

$values = [
    'id' => '',
    'name' => 'RandomData',
    'user_id' => 1,
    'amount' => 10,
    'price' => 20,
];

$query = $fluent
    ->insertInto('products')
    ->values($values)
    ->execute();

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