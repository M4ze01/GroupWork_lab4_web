<?php
session_start();

if (!isset($_SESSION['userID'])) {
     header("Location:login.php");
}


require '..\..\vendor\autoload.php';
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

     <div class="">
          <a class="btn btn-primary float-end p-2 m-4" href="login.php?cup=1" role="button">log out</a>
          <a class="btn btn-primary float-end p-2 m-4" href="form_for_addproduct.php" role="button">Add Product</a>
     </div>

     <table class="table table-striped m-2" id = "table">
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
                   echo '<th scope=' . 'row' . ">$key</th>";
                   echo "<td>$name</td>";
                   echo "<td>$amountPro</td>";
                   echo "<td>$price</td>";
                   echo '<td>
                    <button class="btn btn-warning mx-1" type = "button" 
                    onclick="Edit('.$key.')" name = "Edit_btn" > Edit </button>
                    <button class="btn btn-danger" type = "button" 
                    onclick="DeleteConfirm()" name = "Delete_btn" id ='.$key.' href="../delete.php?id='.$key.'"> Delete </button></td>';
                   echo '</tr>';
               } ?>
          </tbody> 
     </table>
          
     <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.20/sweetalert2.all.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

     <script>
          $(document).ready(function () {
          $('#table').DataTable();
          });

          function Edit(key) {
                    bool = confirm("Are you sure to edit the record");
                    if (!bool) {

                    }
                  }

          function DeleteConfirm() {
                    confirm("Are you sure to delete the record");
                  }

          function deleteRow(productID){
          var xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {                     
               if (xhttp.readyState == 4 && xhttp.status == 200) {
                    alert("Deleted!");
                    }
          };
          document.getElementById("#table").deleteRow(x);
          xhttp.open("GET", "../delete.php", true);
          xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
          xhttp.send("id="+productID);
        }    
     </script>

</body>
</html>