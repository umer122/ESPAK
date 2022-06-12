<?php
include_once 'config.php';
include 'navbar.html';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE admins set id='" . $_POST['id'] . "', codee='123456' WHERE id='" . $_POST['id'] . "'");

//$message = "Record Modified Successfully";
//header('Location:ban_admin_form.php');
?>
<script type="text/javascript">
	window.location.href = 'ban_admin_form.php';
	</script>
<?php
}
$result = mysqli_query($conn,"SELECT * FROM admins WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Employee Data</title>
</head>
<body>
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="all_admins_display.php">Employee List</a>
</div>
ID: <br>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id"  value="<?php echo $row['id']; ?>"readonly>
<br>
Last Name :<br>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>"readonly>
<br>
City:<br>
<input type="text" name="phone" class="txtField" value="<?php echo $row['phone']; ?>"readonly>
<br>
Email:<br>
<input type="text" name="address" class="txtField" value="<?php echo $row['address']; ?>"readonly>
<br>
<br>
<input type="submit" name="submit" value="BAN THIS USER" class="buttom">

</form>
</body>
</html>