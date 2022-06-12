<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "login");
include 'navbar.html';

if (isset($_POST["add_to_cart"])) {
     if (isset($_SESSION["shopping_cart"])) {
          $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
          if (!in_array($_GET["product_id"], $item_array_id)) {
               $count = count($_SESSION["shopping_cart"]);
               $item_array = array(
                    'product_id'               =>     $_GET["product_id"],
                    'product_title'               =>     $_POST["product_title"],
                    'selling_price'          =>     $_POST["selling_price"],
                    'product_quantity'          =>     $_POST["product_quantity"]
               );
               $_SESSION["shopping_cart"][$count] = $item_array;
          } else {
               // echo '<script>alert("Item Already Added")</script>';  
               echo '<script>window.location="add_to_cart.php"</script>';
          }
     } else {
          $item_array = array(
               'product_id'               =>     $_GET["product_id"],
               'product_title'               =>     $_POST["product_title"],
               'selling_price'          =>     $_POST["selling_price"],
               'product_quantity'          =>     $_POST["product_quantity"]
          );
          $_SESSION["shopping_cart"][0] = $item_array;
     }
}
if (isset($_GET["action"])) {
     if ($_GET["action"] == "delete") {
          foreach ($_SESSION["shopping_cart"] as $keys => $values) {
               if ($values["product_id"] == $_GET["product_id"]) {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="add_to_cart.php"</script>';
               }
          }
     }
}
?>



<!DOCTYPE html>
<html>

<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

     <style>
          table,
          th {
               border-collapse: collapse;
               font-family: arial, sans-serif;
          }

          th {
               background: lightblue;
          }

          td,
          th {
               border: 1px solid black;
               padding: 10px;
               font-size: 14px;
          }

          tr:nth-child(even) {
               background-color: #dddddd;
          }

          button a {
               color: white;
               text-decoration: none;
          }

          button a:hover {
               text-decoration: none;
               color: white;
          }

          a {
               text-decoration: none;
          }

          button {
               background-color: #57b857;
               border: none;
               width: 100px;
               height: 30px;
               border-radius: 7px;
               color: white;
               cursor: pointer;
          }

          .order-table {
               margin-top: 70px;
          }

          h2 {
               text-align: center;
          }
          .list {
               display: flex;
               font-size: 36px;
               padding: 0px 4px 30px 0px;
               color: rgb(136, 218, 30);

          }
     </style>
</head>

<body>
<br>
<h3>Order Details</h3>


<div class="table-responsive">
<table border=1>
          <tr>
               <th width="40%">Item Name</th>
               <th width="10%">Quantity</th>
               <th width="20%">Price</th>
               <th width="15%">Total</th>
               <th width="5%">Action</th>
          </tr>
          <?php
          if (!empty($_SESSION["shopping_cart"])) {
               $total = 0;
               foreach ($_SESSION["shopping_cart"] as $keys => $values) {
          ?>
                    <tr>
                         <td><?php echo $values["product_title"]; ?></td>
                         <td><?php echo $values["product_quantity"]; ?></td>
                         <td>RS <?php echo $values["selling_price"]; ?></td>
                         <td>RS <?php echo number_format($values["product_quantity"] * $values["selling_price"], 2); ?></td>
                         <td><button><a href="add_to_cart.php?action=delete&product_id=<?php echo $values["product_id"]; ?>">Remove</a></button></td>
                    </tr>
               <?php
                    $total = $total + ($values["product_quantity"] * $values["selling_price"]);
               }
               ?>
               <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">$ <?php echo number_format($total); ?></td>
                    <td></td>
               </tr>

          <?php
          }
          ?>
     </table>

</div>
</div>
<br />
<div class="text-center">
          
          <input  class="btn btn-success" type="button" onclick="window.location.href = 'user_data_print.php'" value="Print Invoice"/>
          <a href="user_data_print.php" class="btn btn-success">Print</a>
          <a href="add_to_cart.php" class="btn btn-success"> Add More Products </a>
     </div>
     </div>
</body>

</html>