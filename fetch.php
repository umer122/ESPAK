
<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "login");
$output = '';
$query = "SELECT * FROM item ";
$result = mysqli_query($connect, $query);
if (!$result) {
    printf("Error: %s\n", mysqli_error($connect));
    exit();
}
$output = '
<br />
<h3 align="center">Item Data</h3>
<table class="table table-bordered table-striped">
 <tr>
  <th width="30%">Item Name</th>
  <th width="10%">Item Code</th>
  <th width="50%">Description</th>
  <th width="10%">Price</th>
 </tr>
';
while($row = mysqli_fetch_array($result))
{
 $output .= '
 <tr>
  <td>'.$row["product_title"].'</td>
  <td>'.$row["product_category"].'</td>
  <td>'.$row["product_quantity"].'</td>
  <td>'.$row["buying_price"].'</td>
  <td>'.$row["selling_price"].'</td>
  <td>'.$row["supplier"].'</td>
  <td>'.$row["minimum_quantity"].'</td>

 </tr>
 ';
}
$output .= '</table>';
echo $output;
?>
