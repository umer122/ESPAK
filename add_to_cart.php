<?php
     session_start();
     $connect = mysqli_connect("localhost", "root", "", "login");
     include 'navbar.html';
//      if(isset($_POST["add_to_cart"])) {
// 		mysqli_query($conn,"UPDATE products set product_quantity=product_quantity-1 WHERE product_id=75");
// 		}
//           $result = mysqli_query($conn,"SELECT * FROM products WHERE product_id='" . $_GET['product_id'] . "'");
// $row= mysqli_fetch_array($result);
     if (isset($_POST["add_to_cart"])) {


          if (isset($_SESSION["shopping_cart"])) {
               $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");
              
               if (!in_array($_GET["product_id"], $item_array_id)) {
                    $count = count($_SESSION["shopping_cart"]);
                    $item_array = array(
                         'product_id'    =>     $_GET["product_id"],
                         'product_title' =>     $_POST["product_title"],
                         'selling_price'   =>     $_POST["selling_price"],
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
      <title>Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>
      <link rel="stylesheet" href="style.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

      <style>
           .table2 {
                margin: 0px 5px;
           }

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
                border: 1px solid #dddddd;
                padding: 10px;
                font-size: 14px;
           }

           tr:nth-child(even) {
                background-color: #dddddd;
           }

           .list {
                display: flex;
                font-size: 36px;
                padding: 0px 4px 30px 0px;
                color: rgb(136, 218, 30);

           }

           .main-div {
                padding-left: 25px;
                padding-right: 25px;
                top: 0%;
                position: relative;
                transition: all 0.5s ease;
           }
      </style>
 </head>

 <body>
      <br />
      <div class="container" style="width:700px;">
           <h3 align="center">ESPAK INVENTORY STORE</h3><br />
           <div class="table2">
                <table>
                     <thead>
                          <tr>

                               <th>Name</th>
                               <th>Category</th>
                               <th>Supplier</th>
                               <th>Quantity</th>
                               <th>Price</th>
                               <th>Quantity</th>
                               <th> Selling </th>

                          </tr>
                     </thead>
                     <tbody>

                          <?php
                              include 'config.php';
                              $query = "SELECT * FROM products  ";
                              //  update stock set stock = stock - 1 where stock_id = $stock_id
                              $result = mysqli_query($connect, $query);
                              if (mysqli_num_rows($result) > 0) {
                                   while ($row = mysqli_fetch_array($result)) {
                              ?>


                                    <tr>
                                         <form method="post" action="add_to_cart.php?action=add&product_id=<?php echo $row["product_id"]; ?>">

                                              <td><?php echo $row["product_title"] ?></td>
                                              <td> <?php echo $row["product_category"] ?></td>
                                              <td><?php echo $row["supplier"] ?></td>
                                              <td><?php echo $row["product_quantity"] ?></td>
                                              <td><?php echo $row["selling_price"] ?></td>
                                              <td> <input type="text" name="product_quantity" class="form-control" value="1" /> </td>
                                              <input type="hidden" name="product_title" value="<?php echo $row["product_title"]; ?>" />
                                              <input type="hidden" name="selling_price" value="<?php echo $row["selling_price"]; ?>" />


                                              <td>
                                                   <input type='submit' name='add_to_cart' class='btn btn-success' value='Add to Cart' />
                                              </td>
                                         </form>
                                    </tr>

                               <?php

                                   }
                                   ?>
                     </tbody>
                     </form>
                </table>
           </div>


      <?php

                              }
          ?>
      <div style="clear:both"></div>
      <br />

      ////////////////////////////////////////////////////////////////////////////////
      <h3>Order Details</h3>
      <div class="table-responsive">
           <table class="table table-bordered">
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
                               <td>$ <?php echo $values["selling_price"]; ?></td>
                               <td>$ <?php echo number_format($values["product_quantity"] * $values["selling_price"], 2); ?></td>
                               <td><a href="add_to_cart.php?action=delete&product_id=<?php echo $values["product_id"]; ?>"><span class="text-danger">Remove</span></a></td> 

                              </tr>
                     <?php
                              $total = $total + ($values["product_quantity"] * $values["selling_price"]);
                         }
                         ?>
                     <tr>
                          <td colspan="3" align="right">Total</td>
                          <td align="right">$ <?php echo number_format($total, 2); ?></td>
                          <td></td>
                     </tr>
                <?php
                    }
                    ?>
           </table>
      </div>
      <a href="show_cart.php" class="btn btn-success">Show Cart</a>


      </div>
      <br />
 </body>

 </html>