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
     $number = $rowcount + 1;
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

<body>

     <head>
          <style>
               table {
                    margin-top: 20px;
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


               .main-div {
                    background-color: white;
                    margin: auto;
                    border-radius: 20px;
                    box-shadow: 0px 8px 20px 0px rgb(0 0 0 / 15%);
                    margin-top: 50px;
                    padding: 40px 60px;
                    padding-bottom: 20px;
                    margin-bottom: 80px;
                    min-height: 100px;
                    width: 40%;
                    background: #00c16e;
               }

               input,
               select {
                    width: 100%;
                    margin-top: 15px;
                    height: 40px;
                    border: 3px solid #56ab2f;
                    padding-left: 10px;
                    padding-right: 20px;
                    margin-bottom: 15px;
               }

               .w3-container {
                    background-color: #00c16e;
                    box-shadow: 0px 0px 6px 1px rgb(88 80 80);
                    margin-bottom: 40px;
                    text-align: center;
                    border-radius: 10px;
                    color: white;
               }

               label {
                    font-size: 16px;
                    color: black;
                    font-weight: 500;
               }

               .button {
                    background-color: #ffff;
                    width: 180px;
                    margin-top: 20px;
                    border: none;
                    cursor: pointer;
                    border-radius: 10px;
                    color: #00c16e;
                    font-size: 18px;
                    text-transform: capitalize;
                    font-weight: 600;
               }

               .logo {
                    text-align: center;
               }
          </style>
     </head>

     <br>
     <h3 style="margin-top: 50px;">Order Details</h3>


     <div class="table-responsive">
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
                              <?php $product_title = $values["product_title"]; ?>
                              <td><?php echo $values["product_quantity"]; ?> </td>
                              <td>RS <?php echo $values["selling_price"]; ?></td>
                              <td>RS <?php echo number_format($values["product_quantity"] * $values["selling_price"], 2); ?></td>
                         </tr>
                    <?php
                         $total = $total + ($values["product_quantity"] * $values["selling_price"]);
                    }
                    ?>
                    <tr>
                         <td colspan="3" align="right">Total</td>
                         <td align="right">$ <?php echo number_format($total); ?></td>
                    </tr>

               <?php
               }
               ?>
          </table>

     </div>
     </div>
     <br />
     <div class="text-center">



     </div>


     <div class="main-div">

          <form method="post" action="sale_insert.php">
               <label>customer Name</label>
               <input type="text" name="customer_name">

               <br>

               <input type="submit" name="save" value="submit">
          </form>
     </div>

     </div>
</body>

</html>


<br><br>
<div class="text-center">
     <button onclick="window.print();" class="btn btn-primary" id="print-btn">Click Here To Print Invoice</button>
</div>
</body>

</html>