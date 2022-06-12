<script src="sweetalert.min.js"></script>

<?php
include 'config.php';


session_start();

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}
if (isset($_POST['submit'])) 
{
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    mysqli_query( $conn, "insert into contact_us(message, name, email, subject)  values('$message','$name','$email','$subject')" );
    
    $msg="Thanks Message";
    $html = "<table border='3px'>
    <tr><td>Message</td><td>$message</td></tr>
    <tr><td>Name</td><td>$name</td></tr>
    <tr><td>Email</td><td>$email</td></tr>
    <tr><td>Subject</td><td>$subject</td></tr>
    </table>";

    include ('smtp/PHPMailerAutoload.php');
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls'; 
    $mail->SMTPAuth = true;

    $mail->Username = 'mu417822@gmail.com';
    $mail->Password = 'TYPEKEY';
    $mail->SetFrom('mu417822@gmail.com');
    $mail->addAddress('mu417822@gmail.com');
    $mail->IsHTML(true);
    $mail->Subject = 'New Message here From ';
    $mail->Body = ' NEW DATA ' . $html . '   Thank You!';

    $mail->SMTPOptions =array('ssl'=>array (
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false,
    ));

    if($conn)
    {
     echo "Mail send";?>
    <script>
    swal({
        title: "Thanks!",
        text: "Your Message Registered! Please wait for response",
        icon: "success",
    });
    </script>
    <?php
    }
    else
    {
    echo "error occur";?>
        <script>
        swal({
            title: "OPPS!!",
            text: "Error",
            icon: "error",
        });
        </script>
        <?php
    }

}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="website, blog, foo, bar, css, HTML, javascript, PHP">
    <meta name="author" content="Umer ALi">

    <title>Contact Us</title>
    <link rel="stylesheet" href="contact.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.main{
            background-color: white;
            margin: auto;
            border-radius: 20px;
            box-shadow: 0px 0px 6px 1px rgb(88 80 80);
            margin-top: 20px;
            padding: 40px 60px;
           padding-bottom: 20px;
            margin-bottom: 80px;
            min-height: 500px;
            width: 60%;
            background: #00c16e;
        }
        .logo{
            text-align: center;
         
        }
        input{
            width: 100%;
            margin-top: 15px;
            height: 40px;
            border: 3px solid black ;
            padding-left: 10px;
            padding-right: 20px;
            margin-bottom: 15px;
			border-radius: 10px;
        }
        .w3-container{
            background-color: #00c16e;
           
            margin-bottom: 40px;
            text-align: center;
            border-radius: 10px;
            color: white;
        }
    </style>
</head>

<body>
    <div class="main-div">
    <?php
     include 'navbar.html';
   ?>
    </div>
    <div class="logo">
<img src="./images/espaklogo.png " >   
</div> 
    <div class="main">
    <div class="touch">
        <div class="get-in ">
            <span >MESSAGE</span>
            <form method="POST">
                <textarea id="message" placeholder="Enter Message" name="message" rows="8" cols="40"
                    maxlength="200"></textarea>
                <div class="row coloumn" >
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" id="name" name="name">
                    </div>
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
                    </div>

                </div>
                <div class="subject">
                    <input type="text" class="form-control" placeholder="Enter Subject" id="subject" name="subject">
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-light">Send </button>
            </form>
        </div>
        <!-- <div class="address">
            <img src='telephone.png'><span>+92 308 4153579</span>
            <div class="gmail-div">
                <img src='gmail.png'><a href='#'>umerali@gmail.com</a>
            </div>
            <div class="location-div">
                <img src='loction.png'>
                <span>Gulshan-e-Ravi,Lahore Pakistan</span>
            </div>
        </div> -->
    </div>
   
    </div>
</body>

</html>