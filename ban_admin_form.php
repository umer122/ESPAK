<?php
include_once 'config.php';
include 'navbar.html';

$result = mysqli_query($conn, "SELECT * FROM admins");
?>
<!DOCTYPE html>
<html>

<head>

	<title> BAN ADMIN</title>
	<style>
		table {
			width: 100%;
			margin-top: 80px;
			text-align: center;
		}

		table,
		th {

			border-collapse: collapse;
			font-family: arial, sans-serif;
		}

		td,
		th {
			border: 1px solid black;
			padding: 10px;
			font-size: 14px;
		}

		th {
			background: lightblue;
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
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php
	if (mysqli_num_rows($result) > 0) {
	?>
		<table>
			<table>

				<tr>
					<th>SI No</th>
					<th>First Name</th>
					<th> Email</th>
					<th>Phone</th>
					<th>Address id</th>
					<th>DOB</th>
					<th>Status</th>
					<th>Block </th>
					<th>UnBlock</th>


				</tr>
				<?php
				$i = 0;
				while ($row = mysqli_fetch_array($result)) {
				?>
					<tr>
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["name"]; ?></td>
						<td><?php echo $row["email"]; ?></td>
						<td><?php echo $row["phone"]; ?></td>
						<td><?php echo $row["address"]; ?></td>
						<td><?php echo $row["dob"]; ?></td>
						<td><?php

							if ($row['codee'] == "123456") {
								echo "Blocked";
							} else {
								echo "Active";
							}
							?></td>
						<td><button><a href="ban_admin_php.php?id=<?php echo $row["id"]; ?>">Block User</a></button></td>
						<td><button><a href="unban_admin_php.php?id=<?php echo $row["id"]; ?>">Unblock User</a></button></td>

					</tr>
				<?php
					$i++;
				}
				?>
			</table>
		<?php
	} else {
		echo "No result found";
	}
		?>
</body>

</html>