<?php
include_once 'config.php';
include 'navbar.html';
$result = mysqli_query($conn,"SELECT * FROM admins");
?>
<!DOCTYPE html>
<html>
 <head>
 <style>
		table{
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

          button a {
               color: white;
               text-decoration: none;
          }

          button a:hover {
               text-decoration: none;
               color: white;
          }

          a {
               text-decoration: none;
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
	</style>
   <title> Retrive data</title>
   <link rel="stylesheet" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table>
<table >

	  <tr>
	    <th>Sl No</th>
		<th>First Name</th>
		<th> Email</th>
		<th>Phone</th>
		<th>Address id</th>
		<th>DOB</th>
		<th>Update</th>
	  </tr>
			<?php
			$i=0;
			while($row = mysqli_fetch_array($result)) {
			?>
	  <tr>
	    <td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><?php echo $row["phone"]; ?></td>
		<td><?php echo $row["address"]; ?></td>
        <td><?php echo $row["dob"]; ?></td>
		<td><button><a href="update_admin_php.php?id=<?php echo $row["id"]; ?>">Update</a></button></td>
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