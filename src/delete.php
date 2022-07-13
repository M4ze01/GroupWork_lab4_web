<?php

require '..\vendor\autoload.php';

    if (isset($_POST['id'])) {
        $pdo = new PDO('mysql:dbname=learningphp', 'root', '');
        $fluent = new Envms\FluentPDO\Query($pdo);
        $query = $fluent
                    ->deleteFrom('products')
                    ->where('id', (int)$_POST['id'])
                    ->execute();
        header('Location:interface');
    }
    
?>