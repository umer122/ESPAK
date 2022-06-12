<?php
session_start(); //Initialise the session
// Assign a variable to the username captured in the session
$username2 = $_SESSION['SESSION_EMAIL']; 
include 'navbar.html';

//Check whether the session username is empty
if ($_SESSION['SESSION_EMAIL'] == "") 
{ //If it is empty, then redirect the user to the index page
    header("Location:index.php");
    

}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .main-div{
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
        input,select{
            width: 100%;
            margin-top: 15px;
            height: 40px;
            border: 3px solid #56ab2f ;
            padding-left: 10px;
            padding-right: 20px;
            margin-bottom: 15px;
        }
        .w3-container{
            background-color: #00c16e;
            box-shadow: 0px 0px 6px 1px rgb(88 80 80);
            margin-bottom: 40px;
            text-align: center;
            border-radius: 10px;
            color: white;
        }
        label{
            font-size: 16px;
            color: black;
            font-weight: 500;
        }
        .button{
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
        .logo{
            text-align: center;
        }
    </style>
    </head>
  <body>
<div class="logo">
<img src="./images/espaklogo.png " >   
</div> 
    <div class="main-div">

    
	<form method="post" action="add_product_php.php">
    <div class="w3-container">


    <h2>Product ADD </h2>
</div>
		<label> Product Title:</label>
		<input type="text" name="product_title">
		
        
		<label > Select Product Category </lable>
  <select name="product_category" >
    <option disabled selected>-- Select Category --</option>
    <?php
        include "config.php";  // Using database connection file here
        $products_cat = mysqli_query($conn, "SELECT category From category");  // Use select query here 

        while($product_category = mysqli_fetch_array($products_cat))
        {
            echo "<option value='". $product_category['category'] ."'>" .$product_category['category'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>

        
        
		<label>Product Quantity:</label>
		<input type="text" name="product_quantity">
		<label>Buying Price:</label>
		<input type="text" name="buying_price">
		<label>Selling Price</label>
		<input type="text" name="selling_price">
        <label>Minimum Quantity</label>
		<input type="text" name="minimum_quantity">
        <label >Select Supplier  </lable>
  <select name="supplier_name">
    <option disabled selected>-- Select Supplier --</option>
    <?php
        include "config.php";  // Using database connection file here
        $supplier = mysqli_query($conn, "SELECT supplier_name From supplier");  // Use select query here 

        while($supplier_name = mysqli_fetch_array($supplier))
        {
            echo "<option value='". $supplier_name['supplier_name'] ."'>" .$supplier_name['supplier_name'] ."</option>";  // displaying data in option menu
        }	
    ?>  
  </select>

		
    
		
		<input class="button" type="submit" name="save" value="submit">
	</form>
    </div>
  </body>
</html>