<?php
include_once 'config.php';
if(isset($_POST['save']))
{	 
	 $category = $_POST['category'];
	 

	 $sql = "INSERT INTO category (category)
	 VALUES ('$category')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>