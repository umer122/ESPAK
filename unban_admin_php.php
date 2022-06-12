<?php
include_once 'config.php';
include 'navbar.html';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE admins set id='" . $_POST['id'] . "', codee='' WHERE id='" . $_POST['id'] . "'");

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
<title>ESPAK</title>
<style>
		 label{
            font-size: 18px;
            color: black;
            font-weight: 500;
        }
		.main-div{
            background-color: white;
            margin: auto;
            border-radius: 20px;
            box-shadow: 0px 8px 20px 0px rgb(0 0 0 / 15%);
            margin-top: 10px;
            padding: 40px 60px;
           padding-bottom: 20px;
            margin-bottom: 80px;
            min-height: 100px;
            width: 30%;
            background: #00c16e
        }
        input{
            width: 100%;
            margin-top: 15px;
            height: 40px;
            border: 3px solid #56ab2f ;
            padding-left: 10px;
            padding-right: 20px;
            margin-bottom: 15px;
			border-radius: 10px;
        }
		.logo{
            text-align: center;
        }
		.button{
            background-color: #ffff;
            width: 50%;
            margin-top: 20px;
            border: none;
			cursor: pointer;
            border-radius: 10px;
            color: #00c16e;
            font-size: 18px;
            text-transform: capitalize;
            font-weight: 600;
        }
	</style>
<title>Update Employee Data</title>
</head>
<body>
<div class="logo">
<img src="./images/espaklogo.png " >   
</div> 
	<div class="main-div">
<form name="frmUser" method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
<div style="padding-bottom:5px;">
<a href="all_admins_display.php">Employee List</a>
</div>
<label>ID: </label>
<input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
<input type="text" name="id"  value="<?php echo $row['id']; ?>"readonly>

<label>Last Name :</label>
<input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>"readonly>

<label>City:</label>
<input type="text" name="phone" class="txtField" value="<?php echo $row['phone']; ?>"readonly>

<label>Email:</label>
<input type="text" name="address" class="txtField" value="<?php echo $row['address']; ?>"readonly>



<input class="button" type="submit" name="submit" value="UNBAN THIS USER" class="buttom">
</form>
</div>
</body>
</html>