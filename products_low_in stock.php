<!DOCTYPE html>
<html>
<head>
  <title>ESPAK</title>
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

<h2>All Admins</h2>

<table >
  <tr>
    <th>User ID.</th>
    <th> Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
    <th>DOB</th>
    <th>Status</th>


  </tr>

<?php

include "config.php"; // Using database connection file here
include 'navbar.html';

$records = mysqli_query($conn,"select * from products WHERE product_quantity <= 3"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['product_title']; ?></td>
    <td><?php echo $data['product_category']; ?></td>
    <td><?php echo $data['product_quantity']; ?></td>
    <td><?php echo $data['buying_price']; ?></td>
    <td><?php echo $data['selling_price']; ?></td>
    <td><?php echo $data['supplier']; ?></td>
    <td><?php echo $data['minimum_quantity']; ?></td>

    
  
   

<?php
}
?>
</table>

<?php mysqli_close($conn); // Close connection ?>

</body>
</html>