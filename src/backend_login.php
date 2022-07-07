<?php

require '..\vendor\autoload.php';

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $query = $fluent->from('users')->where('email', $email)->where('password', $password)->fetch();
    if ($query === false) {
        echo "<script>alert('username or password is invalid')</script>";
        header('Location: interface/login.php');
    } else {
        echo "<script>alert('Login completed');</script>";
        header('Location: interface/delete_form.php');
    }
}
