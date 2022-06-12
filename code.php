<?php
$con = mysqli_connect("localhost","root","","login");

if(isset($_POST['save_multiple_data']))
{
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $supplier = $_POST['supplier_name'];

    

    foreach($name as $index => $names)
    {
        $s_name = $names;
        $s_phone = $phone[$index];
        $s_supplier = $supplier[$index];

        // $s_otherfiled = $empid[$index];

        $query = "INSERT INTO demo (name,phone,cat) VALUES ('$s_name','$s_phone','$s_supplier')";
        $query_run = mysqli_query($con, $query);
    }

    if($query_run)
    {
                echo "I'm about to learn PHP!<br>";

    }
    else
    {
        echo "Failed";

    }
}
?>