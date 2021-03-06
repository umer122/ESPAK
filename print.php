<?php
$connect = mysqli_connect("localhost", "root", "", "login");
//include 'show_cart.php';
// localhost is localhost
// servername is root
// password is empty
// database name is database
$con = mysqli_connect("localhost", "root", "", "login");

// SQL query to display row count
// in building table
$sql = "SELECT * from sales";

if ($result = mysqli_query($con, $sql)) {

     // Return the number of rows in result set
     $rowcount = mysqli_num_rows($result);

     // Display result
     $number = $rowcount;
}

echo "<h4>Invoice Number: " . $number . "</h4>"; ?>

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
     <style>
          table {
               margin-top: 80px;
               width: 100%;
               text-align: center;
          }

          table,
          th {
               border-collapse: collapse;
               font-family: arial, sans-serif;
          }

          th {
               background: lightblue;
               font-weight: 600;
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
     </style>
</head>

<body>
     <div style="clear:both"></div>
     <br>
     <h3>Order Details</h3>


     <table class="table table-bordered">
          <tr>
               <th width="40%">Item Name</th>
               <th width="10%">Quantity</th>
               <th width="20%">Price</th>
               <th width="15%">Total</th>
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
                    </tr>
               <?php
                    $total = $total + ($values["product_quantity"] * $values["selling_price"]);
               }
               ?>
               <tr>
                    <td colspan="3" align="right">Total</td>
                    <td align="right">Rs <?php echo number_format($total); ?></td>
               </tr>

          <?php
          }
          ?>
     </table>



     </div>
     <br />
     <div class="text-center">



     </div>



     <br><br>
     <div class="text-center">
          <button onclick="window.print();" class="btn btn-primary" id="print-btn">Click Here To Print Invoice</button>
          <a href="invoice_form.php">Visit W3Schools.com!</a>
     </div>
</body>

</html>