<?php
session_start();  
 $connect = mysqli_connect("localhost", "root", "", "login");  
 //include 'navbar.html';
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");  
           if(!in_array($_GET["product_id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'product_id'               =>     $_GET["product_id"],  
                     'product_title'               =>     $_POST["product_title"],  
                     'selling_price'          =>     $_POST["selling_price"],  
                     'product_quantity'          =>     $_POST["product_quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
               // echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="add_to_cart.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'product_id'               =>     $_GET["product_id"],  
                'product_title'               =>     $_POST["product_title"],  
                'selling_price'          =>     $_POST["selling_price"],  
                'product_quantity'          =>     $_POST["product_quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["product_id"] == $_GET["product_id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="add_to_cart.php"</script>';  
                }  
           }  
      }  
 }  
 ?>
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "login");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM products 
  WHERE product_title LIKE '%".$search."%'
  OR product_category LIKE '%".$search."%' 
 ";
}
else
{
 $query = "
  SELECT * FROM products ORDER BY product_id 
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Customer Name</th>
     <th>Address</th>
     <th>City</th>
     <th>Postal Code</th>
     <th>Country</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["product_id"].'</td>
    <td>'.$row["product_title"].'</td>
    <td>'.$row["product_category"].'</td>
    <td>'.$row["product_quantity"].'</td>
    <td>'.$row["buying_price"].'</td>
    <td>'.$row["selling_price"].'</td>
    <td>'.$row["supplier"].'</td>
    <td>'.$row["minimum_quantity"].'</td>

    <td>  <input type="text" name="product_quantity" class="form-control" value="1" />  
    <td>    <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
    </td>

    </td>


   </tr>
  ';
  
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div style="clear:both"></div>  
<br />  
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
          if(!empty($_SESSION["shopping_cart"]))  
          {  
               $total = 0;  
               foreach($_SESSION["shopping_cart"] as $keys => $values)  
               {  
          ?>  
          <tr>  
               <td><?php echo $values["product_title"]; ?></td>  
               <td><?php echo $values["product_quantity"]; ?></td>  
               <td>$ <?php echo $values["selling_price"]; ?></td>  
               <td>$ <?php echo number_format($values["product_quantity"] * $values["selling_price"], 2); ?></td>  
               //<td><a href="add_to_cart.php?action=delete&product_id=<?php echo $values["product_id"]; ?>"><span class="text-danger">Remove</span></a></td> 
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
<a href="show_cart.php" class="btn btn-primary">Show Cart</a>


</body>
</html>

    