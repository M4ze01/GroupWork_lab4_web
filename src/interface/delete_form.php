<?php
require '..\..\vendor\autoload.php';
require '..\delete.php';

if (isset($_POST['Delete_btn'])) {
    deleteProduct((int) $_POST['Delete_btn']);
}
if (isset($_POST['Edit_btn'])) {
    echo 'This is Button2 that is selected';
}

$pdo = new PDO('mysql:dbname=learningphp', 'root', '');
$fluent = new Envms\FluentPDO\Query($pdo);
$query = $fluent->from('products');
$Data = $query->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

     <table class="table table-striped m-5 pb-5 ">
          <thead>
               <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Price</th>
                    <th scope="col">Buttons</th>
               </tr>
          </thead>
          <tbody>
               <?php foreach ($Data as $key => $RowData) {
                   $name = $RowData['name'];
                   $amountPro = $RowData['amount'];

                   $price = $RowData['price'];
                   echo '<tr>';
                   echo '<th scope=' . 'row' . ">$key</th>" . '<br>';
                   echo "<td>$name</td>";
                   echo "<td>$amountPro</td>";
                   echo "<td>$price</td>" . '<br>';
                   echo '<td>
                    
                    <button class="btn btn-warning mx-1" type = "button" value="' .
                       $key .
                       '" name = "Edit_btn" > Edit </button><button class="btn btn-danger" type = "button"value="' .
                       $key .
                       '" name = "Delete_btn" > Delete </button>

                       </td>';
                   echo "<\tr>";
               } ?>
          </tbody> 
     </table>
</body>
</html>