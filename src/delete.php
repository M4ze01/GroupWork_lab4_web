<?php
require '..\..\vendor\autoload.php';

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);

function deleteProduct($ID)
{
    $query = $fluent
        ->deleteFrom('products')
        ->where('id', $ID)
        ->execute();
}
