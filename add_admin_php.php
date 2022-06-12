<?php
include_once 'config.php';
if(isset($_POST['save']))
{	 
	 $first_name = $_POST['first_name'];
	 $password = $_POST['password'];
	 $email = $_POST['email'];
     $phone=$_POST['phone'];
     $address = $_POST['address'];
     $dob = $_POST['dob'];


	 $sql = "INSERT INTO admins (name,email,password,phone,address,dob)
	 VALUES ('$first_name','$email','$password','$phone','$address','$dob')";
	 if (mysqli_query($conn, $sql)) {
		echo '<script>alert("New record created successfully !")</script>';
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>