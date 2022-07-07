<?php

require '..\vendor\autoload.php';

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);

if (isset($_POST['signup'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $userid = $_POST['userid'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    if ($password ==  $cpassword) {
        $values = [
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'u_id' => $userid,
            'password' => $password,
        ];
        $query = $fluent->insertInto('users')
            ->values($values)
            ->execute();
        echo "<script>alert('Register successfully');</script>";
    } else {
        echo "<script>alert('Password does not match my man');</script>";
    }
}
