<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    include 'config.php';
	include 'navbar.html';
    $msg = "";

	?>
<?php
include_once 'config.php';




if(isset($_POST['save']))
{	 
	 $product_title = $_POST['product_title'];
	 $product_category = $_POST['product_category'];
	 $product_quantity = $_POST['product_quantity'];
	 $buying_price = $_POST['buying_price'];
     $selling_price=$_POST['selling_price'];
     $supplier_name = $_POST['supplier_name'];
     $minimum_quantity = $_POST['minimum_quantity'];


	 


	 $sql = "INSERT INTO products (product_title,product_category,product_quantity,buying_price,selling_price,minimum_quantity,supplier,status)
	 VALUES ('$product_title','$product_category','$product_quantity','$buying_price','$selling_price','$minimum_quantity','$supplier_name','1')";
	
	 if (mysqli_query($conn, $sql)) {
		//echo "Email Sent";
		//Create an instance; passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
			//Server settings
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'amiboy875@gmail.com';                     //SMTP username
			$mail->Password   = 'uuigagyenxrgzxpq';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			$email=" SELECT supplier_mail FROM supplier WHERE supplier_name='$supplier_name' ";
			$result = $conn->query($email);
	   
			if ($result->num_rows > 0) {
			  // output data of each row
			  while($row = $result->fetch_assoc()) {
				echo "<br> Email: ". $row["supplier_mail"];
				$se=$row["supplier_mail"];
			  }
			} else {
			  echo "0 results";
			}
			
			//Recipients
			$mail->setFrom('amiboy875@gmail.com');
			$mail->addAddress($se,'ujameel26@gmail.com');
			$mail->addAttachment('espaklogo.png', "Logo");

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'no reply';
			$mail->Body    = 'Products Reached';
			$mail->send();
			if($mail->Send())        //Send an Email. Return true on success or false on error
 {
	?>
	<script type="text/javascript">
	window.location.href = 'indexx.php';
	</script>
	<?php }
		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
		echo "</div>";
		$msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
   
	} else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);
}
?>