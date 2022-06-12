<?php
include_once 'config.php';
if(isset($_POST['save']))
{	 
	 $supplier_name = $_POST['supplier_name'];
	 $supplier_mail = $_POST['supplier_mail'];


	 $sql = "INSERT INTO supplier (supplier_name,supplier_mail)
	 VALUES ('$supplier_name','$supplier_mail')";
	 if (mysqli_query($conn, $sql)) {
		echo '<script>alert("New record created successfully !")</script>';
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>