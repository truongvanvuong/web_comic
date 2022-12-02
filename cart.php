<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/cart.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap"rel ="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
    include 'header.php'
    ?>
<?php

	if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid']; 
        $delcart = $ct->del_product_cart($cartid);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $cartId = $_POST['cartId'];
        $quantity = $_POST['quantity'];
        $update_quantity_cart = $ct->update_quantity_cart($quantity, $cartId);
        if($quantity<=0){
            $delcart = $ct->del_product_cart($cartId);
        }
    }
    ?>
    <div class="cart">
        <div class="grid">
            <div class="grid__row">
                <div class="grid_full-width cart__information">
                    <div class="cart__container">
                        <div class="cart__container__heading">
                            <h1 class="cart__container-title">
                                Giỏ hàng
                            </h1>
                        </div>
                        <div class="cart__container-body">
                            <div class="cart__container__information">
                                    <?php
                                if(isset($update_quantity_cart)){
                                    echo $update_quantity_cart;
                                }
                                ?>
                                <?php
                                if(isset($delcart)){
                                    echo $delcart;
                                }
                                ?>
                                <form action="" method="post">
                                    <table class="cart__container-table">
                                        <thead class="cart__container-table__thead">
                                            <tr class="cart__container-table-theead-tr">
                                                <th class="cart__container_table-th">
                                                    <input type="checkbox" class="cart__container-checkbox" id="checkbox-all" name='checkAll[]' value="<?php echo $result['cartId'] ?>">
                                                </th>
                                                <th class="cart__container_table-th">Sản Phẩm</th>
                                                <th class="cart__container_table-th">Đơn Giá</th>
                                                <th class="cart__container_table-th">Số Lượng</th>
                                                <th class="cart__container_table-th">Số Tiền</th>
                                                <th class="cart__container_table-th">Thao Tác</th>
                                            </tr>
                                        </thead>
                                        <tbody class="cart__container-table__body">
                                        <?php
                                        
                                            $get_product_cart = $ct->get_product_cart();
                                            if($get_product_cart){
                                                $subtotal = 0;
                                                $qty = 0;
                                                while($result = $get_product_cart->fetch_assoc()){
                                            ?>
                                            <tr class="cart__container_table-tr">
                                                <td class="cart__container_table-td"><input class= "cart__container-checkbox" type="checkbox" id="checkItem" name='check[]' value="<?php echo $result['cartId'] ?>"></td>
                                                <td class="cart__container_table-td cart__container_table-td-with">
                                                    <div class="cart__container_table-td-link">
                                                        <a href="#" class="cart__container__item-link">
                                                        <img class="cart__container-item--img" src="admin/assets/img/<?php echo $result['image'] ?>" alt=""></img>
                                                        </a>
                                                        <a href="#" class="cart__container__item-link">
                                                            <span class="cart__container_table-td-name">
                                                            <?php echo $result['productName'] ?>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td class="cart__container_table-td"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
                                                <td class="cart__container_table-td product__information-quantity-with update ">
                                                    <form action="" method="post" class="update">
                                                        <div class="product__information-quantity-order ">
                                                            <div class="btn__action infomation-action__remove ">
                                                                <i class="fa fa-minus"></i>
                                                            </div>
                                                            <div class="product__infomation-quantity">
                                                                <input type="hidden" name="cartId" value="<?php echo $result['cartId'] ?>"/>
                                                                <input type="text" name="quantity"value="<?php echo $result['quantity'] ?>"class="product__information-choose" min ="0" >
                                                            </div>
                                                            <div class="btn__action infomation-action__add ">
                                                                <i class="fa fa-plus"></i>
                                                            </div>
                                                        </div>
                                                        <input type="submit" class="update-btn" name="submit" value="Cập nhật"/>
                                                    </form>
                                                </td>
                                                <td class="cart__container_table-td"><?php
                                                    $price =$result['price'];
                                                    $total = $result['price'] * $result['quantity'];
                                                    echo $fm->format_currency($total)." "."VNĐ";
                                                    ?></td>
                                                <td class="cart__container_table-td">
                                                    <a onclick="return confirm('Bạn có muốn xóa không?');" href="?cartid=<?php echo $result['cartId'] ?>"class="cart__container_table-td--btn">
                                                        Xóa
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                                $subtotal += $total;
                                                $qty = $qty + $result['quantity'];
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="cart__container-payment-sum">
                                        <div class="cart__container-payment-action">
                                            <input class="cart__container-checkbox" type="checkbox" id="checkItem" name='check[]' value=""></th>
                                            <?php
                                        $ct = new cart();
                                        if(isset($_POST['save'])){
        
                                        if(isset($_POST['checkbox-all']) || isset($_POST['check'])){
                                            foreach($_POST['check'] as $cartid)
                                            {
                                                echo '<META HTTP-EQUIV="Refresh" Content="0; ">';
                                                $ct->del_product_cart($cartid);
                                        }}
                                        else{
                                            echo "<script>alert('Hãy Chọn Mục Cần Xóa')</script>";	}
                                        }
                                        ?>
                                        
                                            <div class="cart__container-btn">
                                                <button class="cart__container-btn__all">
                                                </button>
                                                <button onclick = "return confirm('Bạn có chắc chắn muốn xóa những mục đã chọn?')" name="save"  class="cart__container-del"type="submit"> Xóa </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="cart__container-payment">
                                <?php
                                    $check_cart = $ct->check_cart();
                                        if($check_cart){
                                        ?>
                                <div class="cart__container-payment-buying">
                                    <div class="cart__container-payment-buying-sum">
                                        <span class="cart__container-payment-title">
                                            Tổng <?php echo '(';?> <?php  echo $fm->format_currency($qty) ?> x <?php echo $fm->format_currency($price) ?> <?php echo ')';?> :
                                            <?php 
                                        echo $fm->format_currency($subtotal)." "."VNĐ";
                                        Session::set('sum',$subtotal);
                                        Session::set('qty',$qty);
                                        ?>
                                        </span>
                                        <span class="cart__container-payment-title">
                                            Giảm : 10%
                                        </span>
                                        <div class="cart__sum">
                                            <span class="cart__container-payment-title">
                                                Tổng thanh toán :
                                            </span>
                                            <span class="cart__container-payment-price">
                                            <?php 
                                                $giam = $subtotal * 0.1;
                                                $sum_order =$subtotal - $giam;
                                            echo $fm->format_currency($sum_order)." "."VNĐ";
                                            Session::set('sum',$subtotal);
                                            Session::set('qty',$qty);
                                            ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="cart__container-payment-buying-btn">
                                        <button class="btn btn--primary cart__container-payment-buying-btn js__btn-buy">
                                            Mua hàng
                                        </button>
                                    </div>
                                </div>
                                <?php
                                    }else{
                                        echo '<a href="index.php" class="link">Giỏ hàng không có sản phẩm nào! hãy thêm sản phẩm vào giỏ hàng </a>';
                                    }
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Chăm sóc khách hàng</h3>
                        <ul class="footer__list">
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Trung tâm trợ giúp</a>
                             </li>
                             <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Chính sách bảo hành</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Hướng dẫn mua hàng</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Thanh toán</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Vận chuyển</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Giới thiệu</h3>
                        <ul class="footer__list">
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Giới thiệu về chúng tôi</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Điều khoản</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Chính sách bảo mật</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Tuyển dụng</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Thanh toán</h3>
                        <ul class="footer__list">
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Liên kết Tài khoản ngân hàng</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Ví Zalopay</a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">Ví điện tử momo</a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Theo dõi chúng tôi</h3>
                        <ul class="footer__list">
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">
                                    <i class=" footer-item-icon fa-brands fa-facebook"></i>
                                    Facebook
                                </a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">
                                    <i class=" footer-item-icon fa-brands fa-instagram-square"></i>
                                    Instagram
                                </a>
                            </li>
                            <li class="footer__lits-item">
                                <a href="" class="footer-list-link">
                                    <i class=" footer-item-icon fa-brands fa-linkedin"></i>
                                    Linkden
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="grid__column-2-4">
                        <h3 class="footer__heading">Vào cửa hàng trên ứng dụng</h3>
                        <div class="footer__down">
                            <img src="./assets/img/QR_code.png" alt="" class="footer__down-qr">
                            <div class="footer__down-app">
                                <a href="" class="footer__down-app-img-link">
                                    <img src="./assets/img/App_Store.png" alt="" class="footer__down-app-img-store">
                                </a>
                                <a href="" class="footer__down-app-img-link">
                                    <img src="./assets/img/Google_Play.png" alt="" class="footer__down-app-img-google">
                                </a>
                                <a href="" class="footer__down-app-img-link">
                                    <img src="./assets/img/App_Gallery.png" alt="" class="footer__down-app-img-Gallery">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="grid">
                    <div class="footer__bottom_policy">
                        <div class="footer__bottom-policy-list">
                            <ul class="footer__bottom-list">
                                <li class="footer__bottom-item">
                                    <a href="" class="footer__bottom-link">
                                        CHÍNH SÁCH BẢO MẬT
                                    </a>
                                </li>
                                <li class="footer__bottom-item">
                                    <a href="" class="footer__bottom-link">
                                        QUY CHẾ HOẠT ĐỘNG
                                    </a>
                                </li>
                                <li class="footer__bottom-item">
                                    <a href="" class="footer__bottom-link">
                                        CHÍNH SÁCH VẬN CHUYỂN
                                    </a>
                                </li>
                                <li class="footer__bottom-item">
                                    <a href="" class="footer__bottom-link">
                                        CHÍNH SÁCH TRẢ HÀNG VÀ HOÀN TIỀN
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="footer__copyright">
                            <p class="footer__copyright-title">
                                © 2022 - Bản quyền thuộc về Comic
                            </p>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
    <?php

	if(isset($_GET['orderid']) && $_GET['orderid']=='order'){
       $customer_id = Session::get('customer_id');
       $insertOrder = $ct->insertOrder($customer_id);
       $delCart = $ct->del_all_data_cart();
    }
    

 
?>
    <div class="modal__cart js__modal-cart">
        <div class="modal__overlay-cart">
        </div>
        <div class="modal__buy js__buy">
            <div class="modal__buy-heading">
                <h3 class="modal__buy-heading-title">
                    Lựa Chọn Hình Thức Thanh Toán
                </h3>
            </div>
            <div class="modal__buy-body">
                <button class="btn btn--primary modal__btn-off js__buy-btn-off">Thanh Toán Ngoại Tuyến</button>
                <button class="btn modal__btn-online">Thanh Toán Trực Tuyến</button>
                <div class="notify">
                    <span class="notify__title">
                        Hình Thức Thanh Toán Chưa Được Hỗ Trợ
                    </span>
                </div>
            </div>
        </div>
        <div class="modal__pay js__modal-pay">
            <div class="modal__pay-heading">
                <h3 class="modal__pay-title js__buy-btn-off">
                    Thanh Toán Ngoại Tuyến
                </h3>
            </div>
            <?php
			    	 if(isset($update_quantity_cart)){
			    	 	echo $update_quantity_cart;
			    	 }
			    	?>
			    	<?php
			    	 if(isset($delcart)){
			    	 	echo $delcart;
			    	 }
			    	?>
            <div class="modal__pay-body">
                <table class="modal__pay-table">
                    <thead>
                        <tr>
                            <th class="modal__th">Tên sản Phẩm</th>
                            <th class="modal__th">Ảnh</th>
                            <th class="modal__th">Giá</th>
                            <th class="modal__th">Số Lượng</th>
                            <th class="modal__th">Tổng Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php          
                        $get_product_cart = $ct->get_product_cart();
                        if($get_product_cart){
                            $subtotal = 0;
                            $qty = 0;
                            while($result = $get_product_cart->fetch_assoc()){
                        ?>
                        <tr>
                        <td class="modal__td"> <?php echo $result['productName'] ?></td>
                        <td class="modal__td"> <img class="modal__buy--img" src="admin/assets/img/<?php echo $result['image'] ?>" alt=""></img></td>
                        <td class="modal__td"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></td>
                        <td class="modal__td"><?php echo $result['quantity'] ?></td>
                        <td class="modal__td"><?php
                            $price =$result['price'];
                            $total = $result['price'] * $result['quantity'];
                            echo $fm->format_currency($total)." "."VNĐ";
                            ?></td>
                    </tr>
                    <?php 
                 $subtotal += $total;
                 $qty = $qty + $result['quantity'];}} ?>
                    </tbody>
                </table>
                <div class="modal__pay-info">
                    <form action="" method="post">
                    <?php
				$id = Session::get('customer_id');
				$get_customers = $cs->show_customers($id);
				if($get_customers){
					while($result = $get_customers->fetch_assoc()){

				?>
                        <ul class="modal__pay-info-list">
                            <li class="modal__pay-item-title">Tên</li>
                            <li class="dau">:</li>
                            <li class="modal__pay-item"><?php echo $result['name'] ?></li>
                        </ul>
                        <ul class="modal__pay-info-list">
                            <li class="modal__pay-item-title">Thành Phố</li>
                            <li class="dau">:</li>
                            <li class="modal__pay-item"><?php echo $result['country'] ?></li>
                        </ul>
                        <ul class="modal__pay-info-list">
                            <li class="modal__pay-item-title">Số Điện Thoại</li>
                            <li class="dau">:</li>
                            <li class="modal__pay-item"><?php echo $result['phone'] ?></li>
                        </ul>
                        <ul class="modal__pay-info-list">
                            <li class="modal__pay-item-title">Email</li>
                            <li class="dau">:</li>
                            <li class="modal__pay-item"><?php echo $result['email'] ?></li>
                        </ul>
                        <ul class="modal__pay-info-list">
                            <li class="modal__pay-item-title">Địa Chỉ Nhận Hàng</li>
                            <li class="dau">:</li>
                            <li class="modal__pay-item"><?php echo $result['address'] ?></li>
                        </ul>
                        <a href="profile.php" class="modal__buy-link"> Cập nhật thông tin</a>                        
                        <?php }} ?>
                    </form>
                </div>
            </div>
            <?php
							$check_cart = $ct->check_cart();
								if($check_cart){
								?>
            <div class="modal-payment-buying">
                      <div class="modal-payment-buying-sum">
                        <span class="modal-payment-title">
                            Tổng <?php echo '(';?> <?php  echo $fm->format_currency($qty) ?> x <?php echo $fm->format_currency($price) ?> <?php echo ')';?> :
                            <?php 
                        echo $fm->format_currency($subtotal)." "."VNĐ";
                        Session::set('sum',$subtotal);
                        Session::set('qty',$qty);
                        ?>
                        </span>
                        <span class="modal-payment-title">
                            Giảm : 10%
                        </span>
                        <div class="cart__sum">
                            <span class="modal-payment-title">
                                Tổng thanh toán :
                            </span>
                            <span class="modal-payment-price">
                            <?php 
                                $giam = $subtotal * 0.1;
                                $sum_order =$subtotal - $giam;
                            echo $fm->format_currency($sum_order)." "."VNĐ";
                            Session::set('sum',$subtotal);
                            Session::set('qty',$qty);
                            ?>
                            </span>
                        </div>
                    </div>
                    <?php
					}else{ echo' lỗi ';
					}
					  ?>
					
					
            <div class="modal__body-btn">
                <a href="?orderid=order" class="btn btn--primary modal_link">Đặt Hàng</a>
            </div>
        </div>
    </div> 
    <script>
        const remove = document.querySelector('.infomation-action__remove');
        const add = document.querySelector('.infomation-action__add');
        const inputQuantityValue = document.querySelector('.product__information-choose');
        let quantity = 1
        remove.addEventListener('click', () => {
            quantity --;
            if(quantity <= 0) {
                quantity = 0;
                inputQuantityValue.value = quantity;
            } else {
                inputQuantityValue.value = quantity;
            }
        })

        add.addEventListener('click', () => {
            quantity ++;
            inputQuantityValue.value = quantity; 
        })
        
        const Btnbuy = document.querySelector('.js__btn-buy')
        const modalcart =document.querySelector('.js__modal-cart')
        const modalbuy = document.querySelector('.js__buy')
        const Btnoff = document.querySelector('.js__buy-btn-off')
        const modalpay = document.querySelector('.js__modal-pay')

        function showmodal() {
            modalcart.classList.add('open_modal')
            modalbuy.classList.remove('colse')
            modalpay.classList.remove('open')

        }
        function showmodalpay(){
            modalcart.classList.add('open_modal')
            modalpay.classList.add('open')
            modalbuy.classList.add('colse')
        }
        function hidemodal(){
            modalcart.classList.remove('open_modal')
        }
        function nothide(evt){
            evt.stopPropagation();
        }
         Btnbuy.addEventListener('click', showmodal)
         Btnoff.addEventListener('click',showmodalpay)
         modalcart.addEventListener('click',hidemodal)
         modalbuy.addEventListener('click',nothide)
         modalpay.addEventListener('click',nothide)
    </script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var checkboxAll = $('#checkbox-all');
            var courseItemCheckbox = $('input[name="check[]"]');

            //checkboxAll check
            checkboxAll.change(function () {
            var isCheckedAll = $(this).prop('checked');
            courseItemCheckbox.prop('checked', isCheckedAll);
            });

            // courses item checkbox changed
            courseItemCheckbox.change(function () {
            var ischeckedAll = courseItemCheckbox.length === $('input[name="check[]"]:checked').length;
            checkboxAll.prop('checked', ischeckedAll);
            });
        });
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
</body>
</html>