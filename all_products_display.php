<!DOCTYPE html>
<html>
<head>
  <title>Display all records from Database</title>
</head>
<body>

<h2>All Admins</h2>

<table border="2">
  <tr>
    <td>User ID.</td>
    <td> Name</td>
    <td>Email</td>
    <td>Phone</td>
    <td>Address</td>
    <td>DOB</td>
    <td>Status</td>


  </tr>

<?php

include "config.php"; // Using database connection file here
include 'navbar.html';

$records = mysqli_query($conn,"select * from products"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['product_id']; ?></td>
    <td><?php echo $data['product_title']; ?></td>
    <td><?php echo $data['product_category']; ?></td>
    <td><?php echo $data['product_quantity']; ?></td>
    <td><?php echo $data['buying_price']; ?></td>
    <td><?php echo $data['selling_price']; ?></td>
    <td><?php echo $data['supplier']; ?></td>
    <td><?php echo $data['minimum_quantity']; ?></td>

    

<td><a href="update_product_php.php?product_id=<?php echo $data["product_id"]; ?>">Block User</a></td>
		<td><a href="unban_admin_php.php?id=<?php echo $data["id"]; ?>">Unblock User</a></td>

  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($conn); // Close connection ?>

</body>
</html>