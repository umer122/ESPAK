<?php
include_once 'config.php';
include 'navbar.html';
$result = mysqli_query($conn,"SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
 <head>
   <title> ESPAK </title>
   <link rel="stylesheet" href="style.css">
   <style>
	table{
		width: 100%;
		margin-top: 80px;
		text-align: center;
	}
	 table,	 th {
		
		  border-collapse: collapse;
		  font-family: arial, sans-serif;
	 }
	 td, th {
		  border: 1px solid black;
		  padding: 10px;
		  font-size: 14px;
	 }

	 th {
            background: lightblue ;
          }
	 tr:nth-child(even) {
		  background-color: #dddddd;
	 }
	 button {
               background-color: #57b857;
               border: none;
			   width: 100px;
			   height: 30px;
			   border-radius: 5px;
               color: white;
               cursor: pointer;
          }
		  button a {
               color: white;
               text-decoration: none;
          }

          button a:hover {
			color: white;
               text-decoration: none;
          }

          a {
               text-decoration: none;
          }
</style>
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
<table>

	  <tr>
	    <th>Sl No</th>
		<th>Name</th>
		<th> Cateogory</th>
		<th>Quantity</th>
		<th>Buying Price id</th>
		<th>Selling Price</th>
		<th> supplier</th>
		<th> Minimum Quantity</th>
		<th> UPDATE</th>

	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["product_id"]; ?></td>
		<td><?php echo $row["product_title"]; ?></td>
		<td><?php echo $row["product_category"]; ?></td>
		<td><?php echo $row["product_quantity"]; ?></td>
		<td><?php echo $row["buying_price"]; ?></td>
        <td><?php echo $row["selling_price"]; ?></td>
        <td><?php echo $row["supplier"]; ?></td>
        <td><?php echo $row["minimum_quantity"]; ?></td>

		<td><button><a href="update_product_php.php?product_id=<?php echo $row["product_id"]; ?>">Update</a></button></td>
      </tr>
			<?php
			$i++;
			}
			?>
</table>
 <?php
}
else
{
    echo "No result found";
}
?>
 </body>
</html>