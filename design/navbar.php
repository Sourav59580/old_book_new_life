
    <div class="super_container">
        <!-- Header -->
        <header class="header">
            <!-- Top Bar -->
            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918577/phone.png"
                                        alt=""></div>+91 9823 132 111
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img
                                        src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918597/mail.png"
                                        alt=""></div><a href="mailto:fastsales@gmail.com">contact@bbbootstrap.com</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                <div class="top_bar_menu">
                                    <ul class="standard_dropdown top_bar_dropdown">
                                        <li> <a href="#">English<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">Italian</a></li>
                                                <li><a href="#">Spanish</a></li>
                                                <li><a href="#">Japanese</a></li>
                                            </ul>
                                        </li>
                                        <li> <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="#">EUR Euro</a></li>
                                                <li><a href="#">GBP British Pound</a></li>
                                                <li><a href="#">JPY Japanese Yen</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="top_bar_user">
                                    <div class="user_icon"><img
                                            src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg"
                                            alt=""></div>
                                    <div><a href="./signup.php" class="account">
                                    <?php
                                      if(empty($username)){
                                          echo "Register";
                                      }
                                      else{
                                          $get_username = "SELECT firstname FROM register WHERE email='$username'";
                                          $response = $db->query($get_username);
                                          $name = $response->fetch_assoc();
                                          echo "Hello,".$name['firstname'];
                                      }

                                    ?>
                                    </a></div>
                                    <div><a href="./php/logout.php">Logout</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Header Main -->
            <div class="header_main">
                <div class="container">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="./index.php"><img src="./photos/logo.jpg" height="70px"/></a></div>
                            </div>
                        </div> <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix"> <input type="search"
                                                required="required" class="header_search_input"
                                                placeholder="Search for products...">
                                            <div class="custom_dropdown" style="display: none;">
                                                <div class="custom_dropdown_list"> <span
                                                        class="custom_dropdown_placeholder clc">All Categories</span> <i
                                                        class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        <li><a class="clc" href="#">Computers</a></li>
                                                        <li><a class="clc" href="#">Laptops</a></li>
                                                        <li><a class="clc" href="#">Cameras</a></li>
                                                        <li><a class="clc" href="#">Hardware</a></li>
                                                        <li><a class="clc" href="#">Smartphones</a></li>
                                                    </ul>
                                                </div>
                                            </div> <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img
                                                    src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                    <div class="wishlist_icon"><img
                                            src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918681/heart.png"
                                            alt=""></div>
                                    <div class="wishlist_content">
                                        <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                        <div class="wishlist_count">10</div>
                                    </div>
                                </div> <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon"> <img
                                                src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png"
                                                alt="">
                                            <div class="cart_count"><span class="total_cart">
                                                <?php
                                                if(empty($username))
                                                {
                                                    echo "0";
                                                }
                                                else{
                                                    
                                                    $get_data = "SELECT COUNT(bookid) AS result FROM cart WHERE email='$username'";
                                                    $response = $db->query($get_data);
                                                    if($response){
                                                        $data = $response->fetch_assoc();
                                                        echo $data['result'];
                                                    }
                                                    else{
                                                        echo "0";
                                                    }
                                                }
                                                   

                                                 ?>
                                            </span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="./cart.php">Cart</a></div>
                                            <div class="cart_price">
                                            <?php
                                            if(empty($username)){
                                                echo "0";
                                            }
                                            else{
                                                $get_data = "SELECT SUM(sell_price) AS result FROM cart WHERE email='$username'";
                                                   $response = $db->query($get_data);
                                                   if($response){
                                                       $data = $response->fetch_assoc();
                                                       echo $data['result'];
                                                   }
                                                   else{
                                                       echo "0";
                                                   }
                                            }

                                            ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <!-- Menu -->
            <div class="page_menu">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="page_menu_content">
                                <div class="page_menu_search">
                                    <form action="#"> <input type="search" required="required"
                                            class="page_menu_search_input" placeholder="Search for products..."> </form>
                                </div>
                                <ul class="page_menu_nav">
                                    <li class="page_menu_item has-children"> <a href="#">Language<i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children"> <a href="#">Currency<i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item"> <a href="#">Home<i class="fa fa-angle-down"></i></a>
                                    </li>
                                    <li class="page_menu_item has-children"> <a href="#">Contribute<i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Contribute<i class="fa fa-angle-down"></i></a></li>
                                            <li class="page_menu_item has-children"> <a href="#">Menu Item<i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul class="page_menu_selection">
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                    <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children"> <a href="#">E-book-downloads<i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="page_menu_selection">
                                            <li><a href="#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            <li><a href="#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="page_menu_item has-children"> <a href="#">Sell Books</a></li>                                             </a></li>
                                    <li class="page_menu_item"><a href="blog.html">Articles<i
                                                class="fa fa-angle-down"></i></a></li>
                                    <li class="page_menu_item"><a href="contact.html">contact<i
                                                class="fa fa-angle-down"></i></a></li>
                                </ul>
                                <div class="menu_contact">
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>
                                        +38 068 005 3570
                                    </div>
                                    <div class="menu_contact_item">
                                        <div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a
                                            href="mailto:fastsales@gmail.com">fastsales@gmail.com</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <!-- Main Navigation -->
    <nav class="main_nav sticky-top mb-4">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="main_nav_content d-flex flex-row">
                                <!-- Categories Menu -->
                                <!-- Main Nav Menu -->
                                <div class="main_nav_menu sticky-top">
                                    <ul class="standard_dropdown main_nav_dropdown">
                                        <li><a href="index.php">Home<i class="fas fa-chevron-down"></i></a></li>
                                        <li class="hassubs"> <a href="#">Contribute<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li> <a href="#">Book<i class="fas fa-chevron-down"></i></a>
                                                    <ul>
                                                        <li><a href="#">Arts & Music<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Biographies<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Business<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Health & Fitness<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Medical<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Sports<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">PDF<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">DOCs<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">WORD/POWER POINT<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li class="hassubs"> <a href="#">E-book-Downloads <i
                                                    class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li> <a href="#">Arts & Music<i class="fas fa-chevron-down"></i></a>
                                                    <!-- <ul>
                                                        <li><a href="#">Laptop<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Mobiles<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Ipads<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                    </ul> -->
                                                </li>
                                                <li><a href="#">Biographies<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Business<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Engineering<i class="fas fa-chevron-down"></i></a>
                                                  <ul>
                                                        <li><a href="#">Computer Science & Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Electrical Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Civil Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Mechanical Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Architectural Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                        <li><a href="#">Civil Engineering<i class="fas fa-chevron-down"></i></a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Health & Fitness<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Medical<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="#">Sports<i class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="./sell_books.php">Sell Books<i class="fas fa-chevron-down"></i></a></li>
                                        <li><a href="blog.html">Articles<i class="fas fa-chevron-down"></i></a></li>
                                        <li class="hassubs"> <a href="#">Pages<i class="fas fa-chevron-down"></i></a>
                                            <ul>
                                                <li><a href="shop.html">Shop<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="product.html">Product<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="blog_single.html">Blog Post<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="regular.html">Regular Post<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="cart.html">Cart<i class="fas fa-chevron-down"></i></a></li>
                                                <li><a href="contact.html">Contact<i
                                                            class="fas fa-chevron-down"></i></a></li>
                                            </ul>
                                        </li>

                                        <li><a href="contact.php">Contact<i class="fas fa-chevron-down"></i></a></li>
                                    </ul>
                                </div> <!-- Menu Trigger -->
                                <div class="menu_trigger_container ml-auto">
                                    <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                        <div class="menu_burger">
                                            <div class="menu_trigger_text">menu</div>
                                            <div class="cat_burger menu_burger_inner">
                                                <span></span><span></span><span></span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
