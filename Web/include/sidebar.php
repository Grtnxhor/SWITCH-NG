
<body>
    <!-- Search Wrapper Area Start -->
    <div class="search-wrapper section-padding-100">
        <div class="search-close">
            <i class="fa fa-close" aria-hidden="true"></i>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="search-content">
                        <form action="find2.php" method="get">
                            <input type="search" name="search" id="search" placeholder="Enter a product name...">
                            <button type="submit"><img src="img/core-img/search.png" alt=""></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Wrapper Area End -->

    <!-- ##### Main Content Wrapper Start ##### -->
    <div class="main-content-wrapper d-flex clearfix">

        <!-- Mobile Nav (max width 767px)-->
        <div class="mobile-nav">
            <!-- Navbar Brand -->
            <div class="amado-navbar-brand">
                <a href="./index"><img src="img/core-img/c.png" alt=""></a>
            </div>
            <!-- Navbar Toggler -->
            <div class="amado-navbar-toggler">
                <span></span><span></span><span></span>
            </div>
        </div>

        <!-- Header Area Start -->
        <header class="header-area clearfix">
            <!-- Close Icon -->
            <div class="nav-close">
                <i class="fa fa-close" aria-hidden="true"></i>
            </div>
            <!-- Logo -->
            <div class="logo">
                <a href="./index"><img src="img/core-img/c.png" alt=""></a>
            </div>
            <!-- Amado Nav -->
           <a style="color: red; font-size: 18px;" href=".././index"><i class="fa fa-user">Welcome <?php logged_in() ?></i></a>
            <nav class="amado-nav">
                <ul>
                    <li class="active"><a href="./index">Home</a></li>
                    <li><a href="./shop?pcat=Bags&submit=Search+Filter.php">Shop</a></li>
                   
                    <li><a href="./cart">Cart</a></li>
                    <li><a href="./checkout">Checkout</a></li>
                </ul>
            </nav>
            <!-- Button Group -->
            <div class="amado-btn-group mt-30 mb-100">
                <a href="./signin" class="btn amado-btn mb-15">Sign In</a>
                <a href="./create" class="btn amado-btn active">Sign Up</a>
            </div>
            <!-- Cart Menu -->
            <div class="cart-fav-search mb-100">
                <?php
 $sql="SELECT SUM(cart_sn) AS cart from ichange_cart WHERE `Buyer_Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $a = $row['cart'];
    
  ?>           
                <a href="./cart" class="cart-nav"><img src="img/core-img/cart.png" alt=""> Cart <span style="color: red;">( <?php echo $a; ?> )</span></a>
               <?php
           }
           ?>
    <?php
 $sql="SELECT SUM(wish_sn) AS wish from ichange_wish WHERE `wish_Username` = '".$_SESSION['Username']."'";
 $result_set=query($sql);
 while($row= mysqli_fetch_array($result_set))
 {
    $a = $row['wish'];
    
  ?>                   
                 <a href="./wish" class="fav-nav"><img src="img/core-img/favorites.png" alt="">Wishlist <span style="color: red;">( <?php echo $a; ?> )</span></a>
                   <?php
           }
           ?>
                <a href="#" class="search-nav"><img src="img/core-img/search.png" alt=""> Search</a>
            </div>
            <!-- Social Button -->
            <div class="social-info d-flex justify-content-between">
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </div>
        </header>
        <!-- Header Area End -->
       