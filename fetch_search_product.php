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
   <th>ID</th>
   <th>Project Name</th>
   <th>Category</th>
   <th>Quantity</th>
   <th>Buying Price</th>
   <th>Selling Price</th>
   <th>Supplier</th>
   <th>Quantity</th>
   <th>Update</th>
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
    <td><a href="update_product_php.php?product_id=<?php echo $row["product_id"]; ?>Update</a></td>

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