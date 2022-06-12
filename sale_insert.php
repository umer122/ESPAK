
<?php
include_once 'config.php';
include_once 'user_data_print.php';

if(isset($_POST['save']))
{	 
    $customer_name = $_POST['customer_name'];
    $product_title = $product_title;
        

	 $sql = "INSERT INTO sales (invoice_number,customer_name,product_title)
	 VALUES ('$number','$customer_name','$product_title')";
	 if (mysqli_query($conn, $sql)) { 
         ?>
        <script type="text/javascript">
	window.location.href = 'print.php';
	</script>

    <?php
    } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>