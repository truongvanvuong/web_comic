<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/header.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap"rel ="stylesheet">
    <title>Document</title>
    <style>
        .header__search-from{
            flex: 1;
        }
    </style>
</head>
<body>
    
<?php

    include 'lib/session.php';
    Session::init();
    include 'lib/database.php';
	include 'helpers/format.php';
    
	spl_autoload_register(function($class){
        include_once "classes/".$class.".php";
	});
	$db = new Database();
	$fm = new Format();
	$ct = new cart();
	$br = new brand();
	$cat = new category();
	$cs = new customer();
	$product = new product();
    ?>
    <header class="header">
            <div class="grid">
                <nav class="header__navbar">
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--separate">Thông Tin Về Shop</li>
                        <!-- <li class="header__navbar-item header__navbar-item--separate">Trở Thành Người Bán </li> -->
                        <li class="header__navbar-item header__navbar-item--qr header__navbar-item--separate">Tải Ứng Dụng
                            <div class="header__qr">
                                <img src="./assets/img/QR_code.png" alt="QR-code" class="header__qr-img">
                                <div class="header_qr-apps">
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/img/App_Store.png" alt="App Store" class="header__qr-download-img">
                                    </a>
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/img/Google_Play.png" alt="Google Play" class="header__qr-download-img">
                                    </a>
                                    <a href="" class="header__qr-link">
                                        <img src="./assets/img/App_Gallery.png" alt="App Gallery" class="header__qr-download-img height_13">
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="header__navbar-item ">
                            <span class="header__navbar-title--no-pointer">Kết Nối</span>
                            <a href="" class="header_navbar-icon-link">
                                <i class="header__navbar-icon fa-brands fa-facebook"></i>
                            </a>
                            <a href="" class="header_navbar-icon-link">
                                <i class="header__navbar-icon fa-brands fa-instagram-square"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="header__navbar-list">
                        <li class="header__navbar-item header__navbar-item--has-notifi">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-regular fa-bell"></i>
                                Thông Báo
                            </a>
                            <div class="header__notifi">
                                <div class="header__no-notify">
                                    <img src="admin/assets/img/Thongbao.png"alt="" class="header__notify-no-img">
                                    <span class="header__no-notify-title"> Không có thông báo nào</span>
                                </div>
                                <header class="header__notifi-header">
                                    <h3>Thông báo mới</h3>
                                </header>
                                <ul class="header__notifi--list">
                                    <li class="header__notifi--item header__notifi--item--read">
                                        <a href="" class="header__notifi-link">
                                            <img src="https://cf.shopee.vn/file/687f3967b7c2fe6a134a2c11894eea4b_tn" alt="" class="header_notifi-img">
                                            <div class="header__notifi-info">
                                                <span class="header__notifi-name">Áo thun nam POLO trơn vải cá sấu cotton cao cấp ngắn tay cực sang trọng</span>
                                                <span class="header__notifi-descriotion">Áo thun nam POLO trơn vải cá sấu cotton cao cấp ngắn tay cực sang trọng</span>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <footer class="header__notifi-footer">
                                    <a href="" class="header__notifi-footer-btn">Xem Tất Cả</a>
                                </footer>
                            </div>
                        </li>
                        <li class="header__navbar-item">
                            <a href="" class="header__navbar-item-link">
                                <i class="header__navbar-icon fa-regular fa-circle-question"></i>
                                Hỗ Tợ
                            </a>                  
                        </li>
                        <li class="header__navbar-item header__navbar--has-lang">
                            <div class="header__navbar-language">
                                <i class="header__navbar--lang-icon fa-solid fa-globe"></i>
                                Ngôn ngữ
                                <i class="header__navbar--lang-icon fa-solid fa-angle-down"></i>
                                <div class="header__navbar-language-list">
                                    <a href="" class="header__navbar-language-item header__navbar-lang--Vn">
                                        Tiếng Việt
                                    </a>
                                    <a href="" class="header__navbar-language-item header__navbar-lang--Es">
                                        English
                                    </a>
                                </div>
                            </div>
                        </li>
                            <?php 
                                if(isset($_GET['customer_id'])){
                                    $customer_id = $_GET['customer_id'];
                                    $delCart = $ct->del_all_data_cart();
                                    $delCompare = $ct->del_compare($customer_id);
                                    Session::destroy();
                                }
                            ?>
                            
                            <?php
                            $login_check = Session::get('customer_login'); 
                            if($login_check==false){
                                echo '<button class="header__navbar-item header__navbar-item--strong header__navbar-item--separate js-btn-register">Đăng Ký</button>';
                                echo '<button class="header__navbar-item header__navbar-item--strong js-btn-login">Đăng Nhập</button>';
                            }else{
                                echo ' <li class="header__navbar-item header__navbar-user">
                                <span class="header__navbar-user-name">'.Session::get('customer_name').'</span>
                                <ul class="header__navbar-user-menu">
                                <li class="header__navbar-user-item">
                                    <a href="profile.php">
                                        Tài khoản của tôi
                                    </a>
                                </li>
                                <li class="header__navbar-user-item">
                                <a href="myorder.php">
                                    Đơn mua
                                </a>
                            </li>
                                <li class="header__navbar-user-item header__navbar-user-item-separate">
                                    <a href="login.php?customer_id='.Session::get('customer_id').'">
                                        Đăng xuất
                                    </a>
                                </li>
                            </ul>
                                </li>';

                            }
                            ?>
                </nav>
                <div class="header-with__search">
                    <div class="header__logo">
                        <a href="index.php" class="header__logo-link">
                            <div class="header__img-logo">
                                <img src="https://cdn.tgdd.vn/GameApp/3/230194/Screentshots/comico-doc-truyen-tranh-ban-quyen-hay-mien-phi-230194-logo-21-10-2020.png" alt="" class="header__logo-img-link">
                            </div>  
                        </a>                      
                    </div>
                    <div class="header__search-from">
                        <form action="search.php" method="post" class="header__search">
                            <div class="header__search-input-wrap">
                                <input type="text" name="tukhoa" class="header__search-input" placeholder="Nhập để tìm kiếm">
                                <!-- <div class="header__search-histroy">
                                    <h3 class="header__search-histroy-heading">
                                        Lịch sử tìm kiếm
                                    </h3>
                                    <ul class="header__search-histroy-list">
                                        <li class="header__search-histroy-item">
                                            <a href="">Truyện tập 1</a>
                                        </li>
                                        <li class="header__search-histroy-item">
                                            <a href="">Truyện tập 2</a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                            <!-- <div class="header__search-select">
                                <span class="header__search-seclect-label">Trong Shop</span>
                                <i class="header__label-icon fa-solid fa-angle-down"></i>
                                <ul class="header__search-option">
                                    <li class="header__search-option-item header__search-option-item--active">
                                        <span>Trong Shop</span>
                                        <i class="fa-solid fa-check"></i>
                                    </li>
                                    <li class="header__search-option-item">
                                        <span>Ngoài Shop</span>
                                        <i class="fa-solid fa-check"></i>
                                    </li>
                                </ul>
                            </div> -->
                            <button type="submit"  class="header__search-btn" name="search_product">
                                <i class="header__search-btn-icon fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                    <div class="header__cart">
                        <div class="header__cart-warp wrap-hide">
                            <i class="header__cart-icon fa-solid fa-cart-shopping"></i>
                            <?php
                                    $get_product_cart = $ct->get_product_cart();
                                    if($get_product_cart){
                                        $subtotal = 0;
                                        $qty = 1;
                                        while($result = $get_product_cart->fetch_assoc()){
                                    ?>
                            
                            <?php
                                    $check_cart = $ct->check_cart();
                                        if($check_cart){
                                            
                                        ?>
                            <span class="header__cart-notice"><?php echo $fm->format_currency($qty);?></span>
                            <?php }?>
                            <?php 
                            $qty = $qty + $result['quantity'];
                        } } ?>
                        
                            <div class="header__cart-list ">
                                <ul class="header__cart-list-item header__no-car">
                                    <?php
                                    
                                    $get_product_cart = $ct->get_product_cart();
                                    if($get_product_cart){
                                        $subtotal = 0;
                                        $qty = 0;
                                        while($result = $get_product_cart->fetch_assoc()){
                                            ?>   
                                            <li class="header__cart-item">
                                                <img  src="admin/assets/img/<?php echo $result['image'] ?>" alt="" class="header__Cart-item-img">
                                                <div class="header__Cart-item-info">
                                            <div class="header__cart-item-head">
                                                <h5 class="header__cart_item-name"> <?php echo $result['productName'] ?></h5>
                                                 <div class="header__cart-item-price-wrap">
                                                     <span class="header__cart-item-price"><?php echo $fm->format_currency($result['price'])." "."VNĐ"?></span>
                                                     <span class="header__cart-item-multiply">x</span>
                                                     <span class="header__cart-item-quantity"><?php echo $result['quantity'] ?></span>
                                                 </div>
                                            </div>
                                            <div class="header__cart-item-body">
                                                <span class="header__cart-item-description">
                                                </span>
                                                    
                                                <a onclick="return confirm('Bạn có muốn xóa không?');" href="?cartid=<?php echo $result['cartId'] ?>"class="header__cart-item-remove">Xóa</a>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                       $qty = $qty + $result['quantity'];
                                            }}
                                    else{
                                        echo'<div class="header__cart header__no-cart">
                                        <img src="./assets/img/Cart_null.png" alt="Giỏ hàng" class="header__cart-no-cart-img">
                                        <div class="header__cart-warp ">
                                        </div>
                                        </div>';
                                    }
                                    ?>
                                </ul>
                                <?php
	
                                    $login_check = Session::get('customer_login'); 
                                    if($login_check==false){
                                        echo'<span class="not-login"> Đăng nhập để xem giỏ hàng</span>';
                                    }
                                    else{
                                        echo'  <a href="cart.php" class="header__cart-view-cart btn btn--primary">
                                        Xem giỏ hàng
                                    </a>';
                                    }
                                        
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
    </header> 
</body>    
</html>