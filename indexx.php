<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
include 'navbar.html';


//Load Composer's autoloader
require 'vendor/autoload.php';


$connect = new PDO("mysql:host=localhost;dbname=login", "root", "");

function fetch_customer_data($connect)
{
 
 $query = "SELECT * FROM products WHERE status='1'";
 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $output = '
    <table class="table table-striped table-bordered">
   <tr>
   <th>ID</th>
    <th>Name</th>
    <th>Address</th>
    <th>City</th>
    <th>Postal Code</th>
    <th>Country</th>
    <th>Supplier</th>

   </tr>
 ';
 foreach($result as $row)
 {
  $output .= '
   <tr>
   <td>'.$row["product_id"].'</td>
    <td>'.$row["product_title"].'</td>
    <td>'.$row["product_category"].'</td>
    <td>'.$row["product_quantity"].'</td>
    <td>'.$row["buying_price"].'</td>
    <td>'.$row["selling_price"].'</td>
    <td>'.$row["supplier"].'</td>

   </tr>
  ';
 }
 $output .= '
  </table>

 ';
 return $output;
}

if(isset($_POST["action"]))
{
 include('pdf.php');
 $file_name = md5(rand()) . '.pdf';
 $html_code = '<link rel="stylesheet" href="bootstrap.min.css">';
 $html_code .= fetch_customer_data($connect);
 $pdf = new Pdf();
 $pdf->load_html($html_code);
 $pdf->render();
 $file = $pdf->output();
 file_put_contents($file_name, $file);
 
  {
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
    
    //Recipients
    $mail->setFrom('amiboy875@gmail.com');
    $mail->addAddress('ujameel26@gmail.com');
    $mail->AddAttachment($file_name);         //Adds an attachment from a path on the filesystem

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'no reply';
    $mail->Body    = 'Products Reached';
    $mail->send();
    if($mail->Send())        //Send an Email. Return true on success or false on error
 {
  ?>

	<script type="text/javascript">
	window.location.href = 'update_product_status.php';
	</script>
	<?php
}
}
    catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
  echo "</div>";
  $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
 
} 

}
?>
<!DOCTYPE html>
<html>
 <head>
 <style>
      table {
      width: 100%;
      
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

  </style>
  <title>ESPAK</title>
  <link rel="stylesheet" href="navbar.css">
  <script src="jquery.min.js"></script>
  <link rel="stylesheet" href="bootstrap.min.css" />
  <script src="bootstrap.min.js"></script>
  
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Create Dynamic PDF Send As Attachment with Email in PHP</h3>
   <br />
   <form method="post">
    <input type="submit" name="action" class="btn btn-danger" value="PDF Send" />
    <br/><?php echo $message; ?>
   </form>
   <br />
   <?php
   echo fetch_customer_data($connect);
   ?>   
  </div>
  <br />
  <br />
 </body>
</html>
