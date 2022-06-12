<!DOCTYPE html>
<html>
<head>

  <title>ESPAK Admins</title>
  <style>
    table {
      width: 100%;
      margin-top: 100px;
      text-align: center;
    }

    table,
    th {
      border-collapse: collapse;
      font-family: arial, sans-serif;
    }

    th {
      background-color: lightblue;
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

    button {
      background-color: #57b857;
      border: none;
      width: 100px;
      height: 30px;
      line-height: 30px;
      border-radius: 10px;
      cursor: pointer;
    }

    button a {
      color: white;
      text-decoration: none;
    }

    a {
      text-decoration: none;
    }

    button a:hover {
      color: white;
      text-decoration: none;
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
      <th>Block</th>
      <th>UnBlock</th>


  </tr>

<?php

include "config.php"; // Using database connection file here
include 'navbar.html';

$records = mysqli_query($conn,"select * from admins"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['id']; ?></td>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['email']; ?></td>
    <td><?php echo $data['phone']; ?></td>
    <td><?php echo $data['address']; ?></td>
    <td><?php echo $data['dob']; ?></td>
    <td><?php 
  
    if($data['codee'] == ""){
        echo "Activate";
    } 
    else{
      echo "Blocked";
  }
    ?></td>
 <td><button><a href="ban_admin_php.php?id=<?php echo $data["id"]; ?>">Block User<a></button></td>
        <td><button><a href="unban_admin_php.php?id=<?php echo $data["id"]; ?>">Unblock User <a></button></td>

  </tr>	
<?php
}
?>
</table>

<?php mysqli_close($conn); // Close connection ?>

</body>
</html>