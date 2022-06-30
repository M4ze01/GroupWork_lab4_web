<?php
require '..\vendor\autoload.php';

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);

$query = $fluent->deleteFrom('products')->where('id', 12)->execute();
