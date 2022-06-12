<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title> Responsiive Admin Dashboard | CodingLab </title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <div class="logo-espak">
                <span class="image">
        <img class="logo-css" src="images/ESPAK.png" alt="">
    </span>
            </div>
            <span class="logo_name">ESPAK  </span>

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
                <a href="add_supplier_form.php">
                    <i class='bx bx-list-ul'></i>
                    <span class="links_name">Add Suplier</span>
                </a>
            </li>
            <!-- <li>
          <a href="#">
            <i class='bx bx-pie-chart-alt-2' ></i>
            <span class="links_name">Analytics</span>
          </a>
        </li> -->
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
                <a href="#">
                    <i class='bx bx-message'></i>
                    <span class="links_name">Messages</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-heart'></i>
                    <span class="links_name">Favrorites</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links_name">Setting</span>
                </a>
            </li>
            <li class="log_out">
                <a href="#">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Log out</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class='bx bx-menu sidebarBtn'></i>
                <span class="dashboard">Dashboard</span>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search...">
                <i class='bx bx-search'></i>
            </div>
            <div class="profile-details">
                <img src="images/dp.jpg" alt="">
                <span class="admin_name">Umer Ali</span>
                <i class='bx bx-chevron-down'></i>
            </div>
        </nav>

        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Order</div>
                        <div class="number">60</div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bx-cart-alt cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Sales</div>
                        <div class="number">Rs 500,000</div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bxs-cart-add cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Profit</div>
                        <div class="number">Rs 120,000</div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bx-cart cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Products</div>
                        <div class="number">75</div>
                        <div class="indicator">
                            <i class='bx bx-down-arrow-alt down'></i>
                            <span class="text">Down From Today</span>
                        </div>
                    </div>
                    <i class='bx bxs-cart-download cart four'></i>
                </div>
            </div>

            <div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">Recent Sales</div>
                    <div class="sales-details">
                        <ul class="details">
                            <li class="topic">Date</li>
                            <li><a href="#">2 Jan 2022</a></li>
                            <li><a href="#">5 Jan 2022</a></li>
                            <li><a href="#">6 Jan 2022</a></li>
                            <li><a href="#">9 Jan 2022</a></li>
                            <li><a href="#">11 Jan 2022</a></li>
                            <li><a href="#">13 Jan 2022</a></li>
                            <li><a href="#">15 Jan 2022</a></li>
                            <li><a href="#">15 Jan 2022</a></li>
                            <li><a href="#">15 Jan 2022</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Customer</li>
                            <li><a href="#">Umer Ali</a></li>
                            <li><a href="#">Usman Jamil</a></li>
                            <li><a href="#">Hammad Ashraf</a></li>
                            <li><a href="#">Mohsin Zahid</a></li>
                            <li><a href="#">Ahmed Ali</a></li>
                            <li><a href="#">Jawad Ahmed</a></li>
                            <li><a href="#">Saleem Mustafa</a></li>
                            <li><a href="#">Ali Shahzad</a></li>
                            <li><a href="#">Maira</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Sales</li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Returned</a></li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Returned</a></li>
                            <li><a href="#">Delivered</a></li>
                            <li><a href="#">Pending</a></li>
                            <li><a href="#">Delivered</a></li>
                        </ul>
                        <ul class="details">
                            <li class="topic">Total</li>
                            <li><a href="#">1100</a></li>
                            <li><a href="#">2300</a></li>
                            <li><a href="#">750</a></li>
                            <li><a href="#">170</a></li>
                            <li><a href="#">665</a></li>
                            <li><a href="#">880</a></li>
                            <li><a href="#">1000</a></li>
                            <li><a href="#">2500</a></li>
                            <li><a href="#">3500</a></li>
                        </ul>
                    </div>
                    <div class="button">
                        <a href="#">See All</a>
                    </div>
                </div>
                <div class="top-sales box">
                    <div class="title">ESPAK Branded Product</div>
                    <ul class="top-sales-details">
                        <li>
                            <a href="#">
                                <img src="images/sunglasses.jpg" alt="">
                                <span class="product"> Sunglasses</span>
                            </a>
                            <span class="price">570</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/boiler.jpg" alt="">
                                <span class="product">Boilers </span>
                            </a>
                            <span class="price">1567</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/nike.jpg" alt="">
                                <span class="product">Nike Sport Shoe</span>
                            </a>
                            <span class="price">6500</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/pens.jpg" alt="">
                                <span class="product">Pen's</span>
                            </a>
                            <span class="price">300</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/Ladida_bag.jpg" alt="">
                                <span class="product">Ladida Ladies Bag</span>
                            </a>
                            <span class="price">7000</span>
                        </li>
                        <li>
                            <a href="#">
                                <img src="images/bag.jpg" alt="">
                                <span class="product">Gucci Womens's Bags</span>
                            </a>
                            <span class="price">6000</span>
                            <li>
                                <a href="#">
                                    <img src="images/addidas.jpg" alt="">
                                    <span class="product">Addidas Running Shoe</span>
                                </a>
                                <span class="price">4999</span>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="images/shirt.jpg" alt="">
                                    <span class="product">Bilack Wear's Shirt</span>
                                </a>
                                <span class="price">3200</span>
                            </li>
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