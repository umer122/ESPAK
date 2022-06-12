<?php
//insert.php
$connect = mysqli_connect("localhost", "root", "", "login");
if(isset($_POST["product_title"]))
{
 $product_title = $_POST["product_title"];
 $product_category = $_POST["product_category"];
 $product_quantity = $_POST["product_quantity"];
 $buying_price = $_POST["buying_price"];
 $selling_price = $_POST["selling_price"];
 $supplier = $_POST["supplier"];
 $minimum_quantity = $_POST["minimum_quantity"];

 $query = '';
 for($count = 0; $count<count($product_title); $count++)
 {
  $product_title_clean = mysqli_real_escape_string($connect, $product_title[$count]);
  $product_category_clean = mysqli_real_escape_string($connect, $product_category[$count]);
  $product_quantity_clean = mysqli_real_escape_string($connect, $product_quantity[$count]);
  $buying_price_clean = mysqli_real_escape_string($connect, $buying_price[$count]);
  $selling_price_clean = mysqli_real_escape_string($connect, $selling_price[$count]);
  $supplier_clean = mysqli_real_escape_string($connect, $supplier[$count]);
  $minimum_quantity_clean = mysqli_real_escape_string($connect, $minimum_quantity[$count]);

  if($product_title_clean != '' && $product_category_clean != '' && $product_quantity_clean != '' && $buying_price_clean != ''&& $selling_price_clean != ''&& $supplier_clean != ''&& $minimum_quantity_clean != '')
  {
   $query .= '
   INSERT INTO item(product_title, product_category, product_quantity, buying_price, selling_price, supplier, minimum_quantity) 
   VALUES("'.$product_title_clean.'", "'.$product_category_clean.'", "'.$product_quantity_clean.'", "'.$buying_price_clean.'" , "'.$selling_price_clean.'" , "'.$supplier_clean.'" , "'.$minimum_quantity_clean.'"); 
   ';
  }
 }
 if($query != '')
 {
  if(mysqli_multi_query($connect, $query))
  {
   echo 'Item Data Inserted';
  }
  else
  {
   echo 'Error';
  }
 }
 else
 {
  echo 'All Fields are Required';
 }
}
?>

