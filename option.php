<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="col-md-4">
        <div class="form-group mb-2">
        <label > Select Product Category </lable><br>
<br>

<select name="supplier_name[]">
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

        </div>
    </div>
</body>
</html>
