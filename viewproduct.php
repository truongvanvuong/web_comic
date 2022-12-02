<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/viewproduct.css">
    <link rel="stylesheet" href="./assets/css/container.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap"rel ="stylesheet">
    <title>Document</title>
    <style>
        .product-like{
            height: 330px;
            overflow: hidden;
        }
    </style>
</head>
<body>
     <?php
        include 'header.php';
     ?> 
        <?php 
            if(isset($_GET['customer_id'])){
                $customer_id = $_GET['customer_id'];
                $delCart = $ct->del_all_data_cart();
                $delCompare = $ct->del_compare($customer_id);
                Session::destroy();
            }
        ?>
        <?php

if(!isset($_GET['proid']) || $_GET['proid']==NULL){
   echo "<script>window.location ='404.php'</script>";
}else{
    $id = $_GET['proid']; 
}
 $customer_id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

    $productid = $_POST['productid'];
    $insertCompare = $product->insertCompare($productid, $customer_id);
    
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {

    $productid = $_POST['productid'];
    $insertWishlist = $product->insertWishlist($productid, $customer_id);
    
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

    $quantity = $_POST['quantity'];
    $insertCart = $ct->add_to_cart($quantity, $id);
    
}
if(isset($_POST['binhluan_submit'])){
    $binhluan_insert = $cs->insert_binhluan();
}
?>
    <div class="product">
        <div class="grid product__content">
                <?php

                    $get_product_details = $product->get_details($id);
                    if($get_product_details){
                        while($result_details = $get_product_details->fetch_assoc()){
                ?>
            <div class="grid__row">
                <div class="product__view">
                    <div class="product__view-information-img">
                        <div class="product__view--img">
                            <img src="admin/assets/img/<?php echo $result_details['image'] ?>" alt="" class="product__view-item-img">
                        </div>
                        <div class="product__view-social">
                            <span class="product__view-share">Chia sẻ</span>
                            <div class="product__view-socical-list">
                                <a href="" class="product__view-link">
                                    <img src="https://www.kindpng.com/picc/m/57-571745_facebook-logo-circle-email-signature-facebook-icon-small.png" alt="" class="product__view_link-img">
                                </a>
                                <a href="" class="product__view-link">
                                    <img src="./assets/img/mess.png" alt="" class="product__view_link-img">
                                </a>
                                <a href="" class="product__view-link">
                                    <img src="https://i.pinimg.com/originals/98/a6/de/98a6de54dc27442a3c8375ab303c6e42.jpg" alt="" class="product__view_link-img">
                                </a>
                                <a href="" class="product__view-link">
                                    <img src="./assets/img/twiter.png" alt=""  class="product__view_link-img twiter">
                                </a>
                            </div>
                        </div>           
                   </div>  
                   <div class="product__view-order">
                       <div class="product__information">
                           <span class="product__information-name">
                           <?php echo $result_details['productName'] ?>
                           </span>
                           <div class="product__information-basic">
                               <div class="product__information-basic-container">
                                   <ul class="product__information-basic-list">
                                       <li class="product__information-basic-item">
                                           Nhà Cung Cấp :
                                       </li>
                                       <li style ="text-transform: uppercase;" class="product__information-basic-item-name">
                                       <?php echo $result_details['supplier']?>

                                       </li>
                                   </ul>
                                   <ul class="product__information-basic-list">
                                       <li class="product__information-basic-item">
                                           Nhà xuất bản :
                                       </li>
                                       <li style ="text-transform:uppercase;" class="product__information-basic-item-name">
                                       <?php echo $result_details['brandName']?>
                                       </li>
                                   </ul>
                               </div>
                               <div class="product__information-basic-container">
                                   <ul class="product__information-basic-list">
                                       <li class="product__information-basic-item">
                                           Tác giả :
                                       </li>
                                       <li class="product__information-basic-item-name">
                                       <?php echo $result_details['author']?>
                                       </li>
                                   </ul>
                                   <ul class="product__information-basic-list">
                                       <li class="product__information-basic-item">
                                           Họa sĩ :
                                       </li>
                                       <li class="product__information-basic-item-name">
                                       <?php echo $result_details['painter']?>
                                       </li>
                                   </ul>
                               </div>
                           </div>
                           <div class="product__information-price">
                               <span class="product__information-price-old">
                               <?php echo $fm->format_currency($result_details['listed_price']).""."đ" ?>
                               </span>
                               <span class="product__information-present">
                               <?php echo $fm->format_currency($result_details['price'])." "."VNĐ" ?>
                               </span>
                               <span class="product__information-discount">
                                   10% Giảm
                               </span>
                           </div>
                       </div>
                       <div class="product__information-add_cart">
                           <form action="" method="post">
                               <div class="product__information-quantity-order">
                                   <span class="product__information-title">
                                       Số lượng
                                   </span>
    
                                   <div class="btn__action infomation-action__remove">
                                       <i class="btn__action-icon fa fa-minus"></i>
                                    </div>
    
                                    <div class="product__infomation-quantity">
                                        <input type="text"class="product__information-choose" name="quantity" value="1" min="1">
                                    </div>
                                        
                                    <div class="btn__action infomation-action__add">
                                        <i class="btn__action-icon fa fa-plus"></i>
                                    </div>
                               </div>
                               <div class="product__information-btn">
                               <?php
	
                                    $login_check = Session::get('customer_login'); 
                                    if($login_check==false){
                                        echo'<span class="not-login"> Đăng nhập để mua sản phẩm</span>';

                                    }
                                    else{
                                        echo'
                                        <button href="" type="submit" name="submit" class="product__information-add__cart">
                                        <i class="product__information-add__cart-icon fa-solid fa-cart-plus"></i>
                                            Thêm Vào Giỏ Hàng
                                        </button>
                                        <button href=""type="submit" name="submit" class="btn btn--primary product__information-btn-buy">
                                            Mua Ngay
                                        </button>';
                                    }
                                        
                                ?>
                               </div>
                           </form>
                           <?php
                                if(isset($insertCart)){
                                    echo $insertCart;
                                }
                            ?>
                           <div class="product__information-shipping">
                               <span class="product__information-item">
                                   <img src="./assets/img/back.png" alt="" class="product__information-shipping-img">
                                   7 Ngày miễn phí trả hàng
                               </span>
                               <span class="product__information-item">
                                   <img src="./assets/img/ship.png" alt="" class="product__information-shipping-img">
                                   Hàng chính hàng 100%
                                </span>
                               <span class="product__information-item">
                                   <img src="./assets/img/shield.png" alt="" class="product__information-shipping-img">
                                   Miễn phí vận chuyển
                                </span>
                           </div>
                       </div>
                   </div>
                </div>
                <div class="grid_full-width ">
                    <div class="product__details-information">
                        <div class="product__details">
                            <h3 class="product__details-heading">
                                CHI TIẾT SẢN PHẨM
                            </h3>
                            <div class="product__details-body">
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Danh mục
                                    </li>
                                    <a style ="text-transform: uppercase;" href="productbycat.php?catid=<?php echo $result_details['catId']?>" class="product__details-link"><?php echo $result_details['catName'] ?></a>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Nhà xuất bản
                                    </li>
                                    <a href="" style ="text-transform: uppercase;"class="product__details-link"><?php echo $result_details['brandName']?></a>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Nhập khẩu/Trong nư
                                    </li>
                                    <li class="product__details-item__2">
                                        Trong nước
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Ngôn ngữ 
                                    </li>
                                    <li class="product__details-item__2">
                                        Tiếng việt
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Xuất xứ
                                    </li>
                                    <li class="product__details-item__2">
                                        Chưa cập nhật
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Loại nắp
                                    </li>
                                    <li class="product__details-item__2">
                                        Bìa mềm
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Loại phiên bản
                                    </li>
                                    <li class="product__details-item__2">
                                        Thông thường
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Nhà cung cấp
                                    </li>
                                    <li class="product__details-item__2">
                                    <?php echo $result_details['supplier']?>
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Năm 
                                    </li>
                                    <li class="product__details-item__2">
                                        2022
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Kho hàng
                                    </li>
                                    <li class="product__details-item__2">
                                        416
                                    </li>
                                </ul>
                                <ul class="product__details-list">
                                    <li class="product__details-item">
                                        Gửi từ
                                    </li>
                                    <li class="product__details-item__2">
                                        Quận Bắc Từ Liêm, Hà Nội
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="product__description">
                            <div class="product__description-container">
                                <h3 class="product__description-heading">
                                    MÔ TẢ 
                                </h3>
                                <div class="product__description-body">
                                    <p class="product__description-title">
                                    <?php echo $fm->textShorten($result_details['product_desc'],10000) ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product__feedback">
                        <div class="product__feedback-content">
                            <h3 class="product__feedback-heading">
                                ĐÁNH GIÁ SẢN PHẨM
                            </h3>
                            <div class="product__feedback-body">
                                <span class="product__feedback-title">
                                    Nhận xét của bạn về sản phẩm
                                </span>
                                <?php
                                    if(isset($binhluan_insert)){
                                        echo $binhluan_insert;
                                    } 
                                    ?>
                                <form action="" method="post">
                                    <div  class="product__feedback-comment">
                                        <div class="product__feedback-contact">
                                            <span class="product__feedback-contact-tile">
                                                1.Thông tin của bạn
                                            </span>
                                            <p><input type="hidden" value="<?php echo $id ?>" name="product_id_binhluan"></p>
                                            <div class="product__feedback-contact-body">
                                                <input type="text" name="tennguoibinhluan" placeholder="Tên của bạn" required id="" class="product__feedback-contact-info">
                                            </div> 
                                            <div class="product__feedback-contact-body">
                                               <input type="email" name ="email_bl"placeholder="Email" required id="" class="product__feedback-contact-info">
                                            </div> 
                                        </div>
                                        <div class="product__feedback-comment-content">
                                            <span class="product__feedback-comment-title">
                                                2.Nhận xét của bạn
                                            </span>
                                            <textarea name="binhluan" id="" rows="10" required id=""name="binhluan" placeholder="Viết nhận xét của bạn" class="product__feedback-comment-body"></textarea>
                                        </div>
                                        <input class=" btn btn--primary product__feedback-comment-btn"name="binhluan_submit" type="submit" value="Gửi">                                   
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
			   }
		       }
		      ?>
            <div class="product__similar">
                <div class="product__similar-heading">
                    <p class="product__similar-title">
                        Có Thể Bạn Thích
                    </p>
                </div>
                <div class="product__similar-body">
                    <div class="grid__row product-like">
                    <?php
                            $product_feathered = $product->getproduct_feathered();
                            if($product_feathered){
                            while($result = $product_feathered->fetch_assoc()){

                            ?>
                        <div class="grid__column-2">
                        <a class="home-product-item" href="viewproduct.php?proid=<?php echo $result['productId'] ?>">
                                    <img class="home-product-item--img" src="admin/assets/img/<?php echo $result['image'] ?>" alt=""></img>
                                    <h4 class="home-product__name"><?php echo $result['productName'] ?></h4>
                                    <div class="home-product__price">
                                        <span class="home-product__price-old"><?php echo $result['listed_price'].""."đ" ?></span>
                                        <span class="home-product__price-current"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span>
                                    </div>
                                    <div class="home-product-item__action">
                                        <span class="home-product-item__like home-product-item__like--liked">
                                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                            <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class=" fa-solid fa-star"></i>
                                        </div>
                                        <!-- <span class="home-product-item__sold">
                                            0 đã bán
                                        </span> -->
                                    </div>
                                    <div class="home-product-item__origin">
                                        <span style ="text-transform: uppercase;" class="home-product-item__brand"><?php echo $result['brandName'] ?></span>
                                        <span style ="text-transform: uppercase;" class="home-product-item__origin--name"><?php echo $result['catName'] ?></span>
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fa-solid fa-check"></i>
                                        <span>yêu thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__percent">10%</span>
                                        <span class="home-product-item__label">Giảm</span>
                                    </div>
                                </a>
                        </div>
                        <?php
                                        }
                                    }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
    <script>
        const remove = document.querySelector('.infomation-action__remove');
        const add = document.querySelector('.infomation-action__add');
        const inputQuantityValue = document.querySelector('.product__information-choose');
        let quantity = 1
        remove.addEventListener('click', () => {
            quantity --;
            if(quantity <= 1) {
                quantity = 1;
                inputQuantityValue.value = quantity;
            } else {
                inputQuantityValue.value = quantity;
            }
        })

        add.addEventListener('click', () => {
            quantity ++;
            inputQuantityValue.value = quantity; 
        })
    </script>
</body>
</html>