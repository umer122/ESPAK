<?php
session_start();

if (!isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: index.php");
    die();
}

$total = 0;
foreach ($_SESSION["shopping_cart"] as $keys => $values) {
    $values["product_title"];
    $values["product_quantity"];
    $values["selling_price"];
    number_format($values["product_quantity"] * $values["selling_price"], 2);

    $total = $total + ($values["product_quantity"] * $values["selling_price"]);
}

include 'config.php';
$query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");
$admin = mysqli_query($conn, "SELECT * FROM admins");

if (mysqli_num_rows($admin) > 0) {
    $row = mysqli_fetch_assoc($admin);
}



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<link rel="icon" href="./images/espaklogo.png" type="image/png" sizes="16x16">

<style>
    thead {
        font-weight: 500;
        font-size: 20px;
        margin-top: 30px;
    }
   
td{
    width: 30%;
}
    blink {
        -webkit-animation: 2s linear infinite condemned_blink_effect;
         animation: 2s linear infinite condemned_blink_effect;}

    /* for Safari 4.0 - 8.0 */
    @-webkit-keyframes condemned_blink_effect {
        0% {
            visibility: hidden;
        }

        50% {
            visibility: hidden;
        }

        100% {
            visibility: visible;
        }
    }

    @keyframes condemned_blink_effect {
        0% {
            visibility: hidden;
        }

        50% {
            visibility: hidden;
        }

        100% {
            visibility: visible;
        }
    }

    table {
        border-collapse: collapse;
        margin-top: 10px;
        line-height: 2.2;
    }
</style>

<head>
    <meta charset="UTF-8">
    <title> Admin Dashboard </title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo-espak">
                <span class="image">
                    <img class="logo-css" src="images/ESPAK.png" alt="espak">
                </span>
            </div>
            <span class="logo_name">ESPAK </span>

        </div>
        <ul class="nav-links">
            <li>
                <a href="#" class="active">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="add_product_form.php">
                    <i class='bx bx-box'></i>
                    <span class="links_name">Add Products</span>
                </a>
            </li>
            <li>
                <a href="add_to_cart.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Add to Cart</span>
                </a>
            </li>
            <li>
                <a href="add_supplier_form.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Add Suplier</span>
                </a>
            </li>

            <li>
                <a href="add_category_form.php">
                    <i class='bx bx-coin-stack'></i>
                    <span class="links_name">Add Category</span>
                </a>
            </li>
            <li>
                <a href="show_cart.php">
                    <i class='bx bx-book-alt'></i>
                    <span class="links_name">Total order</span>
                </a>
            </li>
            <li>
                <a href="all_admins_display.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">All Admins</span>
                </a>
            </li>
            <li>
                <a href="contact.php">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Messages</span>
                </a>
            </li>

           
            <li class="log_out">
                <a href="logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <?php

        ?>
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" name="search_text" id="search_text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <img src="./images/perosn.png" alt="">
                <span class="admin_name">
                    <?php echo $row['name']; ?></span>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Products</div>
                        <?php
                        $con = mysqli_connect("localhost", "root", "", "login");
                        $sql = "SELECT * from products";

                        if ($result = mysqli_query($con, $sql)) {
                            $rowcount = mysqli_num_rows($result);
                        }
                        ?>
                        <div class="number"> <?php printf($rowcount); ?></div>
                        <div class="indicator">
                        </div>
                    </div>
                    <i class='bx bx-cart-alt cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Sales</div>
                        <div class="number">
                            <?php echo number_format($total, 2); ?>
                        </div>
                        <div class="indicator">
                        </div>
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Suppliers</div>
                        <?php


                        $con = mysqli_connect("localhost", "root", "", "login");

                        $sql = "SELECT * from supplier";

                        if ($result = mysqli_query($con, $sql)) {
                            $rowcount = mysqli_num_rows($result);
                        }



                        ?>
                        <div class="number"> <?php printf($rowcount); ?></div>
                        <div class="indicator">

                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Products</div>

                        <?php


                        $con = mysqli_connect("localhost", "root", "", "login");

                        $sql = "SELECT * from products";

                        if ($result = mysqli_query($con, $sql)) {

                            $rowcount = mysqli_num_rows($result);
                        }

                        ?>
                        <div class="number"> <?php printf($rowcount); ?></div>
                        <div class="indicator">
                        </div>
                    </div>
                    <i class='bx bxs-cart-download cart four'></i>
                </div>
            </div>


            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Recent Sales</div>
                    <div class="sales-details" >
                        <ul class="details" style=" width:100%">
                        <table  style=" width:100%;">
                            <tr>
                                <thead>
                                    <td >Product Name</td>
                                    <td> Selling Price</td>
                                    <td> Supplier</td>
                                    <td> Quantity</td>
                                </thead>
                            </tr>
                                <?php
                       $records = mysqli_query($conn, "select * from products  ORDER BY product_title DESC LIMIT 10");
                       
                           while ($data = mysqli_fetch_array($records)) {

                           ?>
                            <tbody>
                                    <tr> 
                                        <td><?php echo $product_id=$data['product_title']; ?></td>
                                        <td ><?php echo $data['selling_price']; ?></td>
                                        <td ><?php echo $data['supplier']; ?></td>
                                        <td ><?php echo $data['product_quantity']; ?></td>
                                    </tr>
                                    
                                </tbody>
                                <?php
                           
                        }
                                ?>
                            </table>                           
                        </ul>
               
                    </div>
                    <br/>
                    <div class="button">
                        <a href="search_product.php">See All</a>
                    </div>
                </div>
                <div class="top-sales box">
                    <div class="title" style='  padding: 20px;
                        background-color: #00c16e;
                    color: white;'>
                        <blink> ESPAK Branded Product

                        </blink>

                    </div>
                    <ul class="top-sales-details">



                        <table style='width:100%; '>
                            <tr >
                                <thead>
                                    <td style='width:75%; ' >Name</td>
                                    <td> Quantity</td>
                                </thead>
                            </tr>
                            
                            <?php
                             $prod = mysqli_query($conn, "select * from products WHERE product_quantity <= 5 LIMIT 10");

                           while ($data = mysqli_fetch_array($prod)) {

                           ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $data['product_title']; ?></td>
                                        <td style='text-align:center '><?php echo $data['product_quantity']; ?></td>
                                    </tr>
                                    
                                </tbody>
                                <?php
                        }
                                ?>
                            
                               
                            </table>
                            
                            <div style="margin-top:10px" class="button">
                        <a href="#">See All</a>
                    </div>
                    </ul>
                    
                </div>
            </div>
            
        </div>

    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function() {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else
                sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    </script>

</body>

</html>
<?php


?>

