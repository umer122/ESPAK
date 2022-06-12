<?php
include_once 'config.php';
if (count($_POST) > 0) {
    mysqli_query($conn, "UPDATE products set product_id='" . $_POST['product_id'] . "', product_title='" . $_POST['product_title'] . "', product_category='" . $_POST['product_category'] . "', product_quantity='" . $_POST['product_quantity'] . "' , buying_price='" . $_POST['buying_price'] . "' , selling_price='" . $_POST['selling_price'] . "' , supplier='" . $_POST['supplier'] . "', minimum_quantity='" . $_POST['minimum_quantity'] . "' WHERE product_id='" . $_POST['product_id'] . "'");
    //$message = "Record Modified Successfully";
    header('Location:update_product_form.php');
}
$result = mysqli_query($conn, "SELECT * FROM products WHERE product_id='" . $_GET['product_id'] . "'");
$row = mysqli_fetch_array($result);
?>
<html>

<head>
    <title>Update</title>
    <style>
        .main-div {
            background-color: white;
            margin: auto;
            border-radius: 20px;
            box-shadow: 0px 8px 20px 0px rgb(0 0 0 / 15%);
            margin-top: 10px;
            padding: 40px 60px;
            padding-bottom: 20px;
            margin-bottom: 80px;
            min-height: 500px;
            width: 60%;
            background: #00c16e;
        }

        input,
        select {
            width: 100%;
            margin-top: 15px;
            height: 40px;
            border: 3px solid #56ab2f;
            padding-left: 10px;
            padding-right: 20px;
            margin-bottom: 15px;
        }

        .w3-container {
            background-color: #00c16e;
            box-shadow: 0px 0px 6px 1px rgb(88 80 80);
            margin-bottom: 40px;
            text-align: center;
            border-radius: 10px;
            color: white;
        }

        label {
            font-size: 16px;
            color: black;
            font-weight: 500;
        }

        .button {
            background-color: #ffff;
            width: 180px;
            margin-top: 20px;
            border: none;
            cursor: pointer;
            border-radius: 10px;
            color: #00c16e;
            font-size: 18px;
            text-transform: capitalize;
            font-weight: 600;
        }

        .logo {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="logo">
        <img src="./images/espaklogo.png ">
    </div>
    <div class="main-div">
        <form name="frmUser" method="post" action="">
            <div><?php if (isset($message)) {
                        echo $message;
                    } ?>
            </div>
            <div style="padding-bottom:5px;">
                <a href="all_admins_display.php">Employee List</a>
            </div>
            <label>product_id:</label>
            <input type="hidden" name="product_id" class="txtField" value="<?php echo $row['product_id']; ?>">
            <input type="text" name="product_id" value="<?php echo $row['product_id']; ?>">

            <label>product_title: </label>
            <input type="text" name="product_title" class="txtField" value="<?php echo $row['product_title']; ?>">

            <label>product_category :</label>
            <input type="text" name="product_category" class="txtField" value="<?php echo $row['product_category']; ?>">

            <label>product_quantity:</label>
            <input type="text" name="product_quantity" class="txtField" value="<?php echo $row['product_quantity']; ?>">

            <label>buying_price:</label>
            <input type="text" name="buying_price" class="txtField" value="<?php echo $row['buying_price']; ?>">

            <label>selling_price:</label>
            <input type="text" name="selling_price" class="txtField" value="<?php echo $row['selling_price']; ?>">

            <label>supplier:</label>
            <input type="text" name="supplier" class="txtField" value="<?php echo $row['supplier']; ?>">

            <label>minimum_quantity:</label>
            <input type="text" name="minimum_quantity" class="txtField" value="<?php echo $row['minimum_quantity']; ?>">

            <input class="button" type="submit" name="submit" value="Submit" class="buttom">

        </form>
    </div>
</body>

</html>