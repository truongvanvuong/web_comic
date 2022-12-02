<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/footer.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap"rel ="stylesheet">
    <title>Document</title>
    <style>
        .option__name{
            font-weight:400;
            font-size: 1.5rem;
        }
        .with-btn{
            width: 77px;
        }
        .with-btn-2{
            width: 62px;
        }
    </style>
</head>
<body>
<?php
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
       
       $insert_Customers = $cs->insert_customers($_POST); 
   }
   ?>
   <?php
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
       $login_Customers = $cs->login_customers($_POST);
   }
   ?>
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

    <div class="modal js__modal"> 
        <div class="modal__overlay">
            
        </div>
        <div class="modal__body js__body"> 
            <!-- register from -->
            <div class="auth-from js__form-register">
                <form  action="login.php" method="POST">

                    <div class="auth-from__container">
                        <div class="auth-from__header">
                            <h3 class="auth-from__heading">Đăng Ký</h3>
                            <input type="button" class="auth-from_swith-btn js-btn-login with-btn" value="Đăng Nhập">
                        </div>
                        <div class="auth-from__from">
                            <div class="auth-from__group">
                                <input type="text"name="name" class="autu-from__input" require id="" placeholder="Tên đăng ký">
                            </div>
                            <div class="auth-from__group">
                                <input type="email" class="autu-from__input" name="email" require id="" placeholder="Email">
                            </div>
                            <div class="auth-from__group">
                                <input type="number" class="autu-from__input"  name="phone" require id="" placeholder="Số điện thoại" >
                            </div>
                            <div class="auth-from__group">
                                <select id="country" name="country" onchange="change_country(this.value)" class="autu-from__input">
                                    <option class="option__name" value="null">Tỉnh thành</option>
                                    <option class="option__name" value="TP Hồ Chí Minh">TPHCM</option>
                                    <option class="option__name" value="Nghê An">Nghệ An</option>
                                    <option class="option__name" value="Hà Nội">Hà Nội</option>
                                    <option class="option__name" value="Đà Nẵng">Đà Nẳng</option>
                                </select>
                            </div>
                            <div class="auth-from__group">
                                <input type="text" name="address"class="autu-from__input" require id="" placeholder="Địa chỉ">
                            </div>
                            <div class="auth-from__group">
                                <input type="password" name="password" class="autu-from__input" require id="" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="auth-from__aside">
                            <p class="auth-from__policy-text">
                                Bằng việc đăng kí, bạn đã đồng ý với chúng tôi về
                                <a href="" class="auth-from__text-link">Điều khoản dịch vụ</a> &
                                <a href="" class="auth-from__text-link">Chính sách bảo mật</a>
                            </p>
                        </div>
                        <div class="auth-from-controls">
                            <input type="button" Value="TRỞ LẠI" class="btn auth-from-controls-back btn--normal js-back">
                            <input class="btn btn--primary" type="submit" name="submit" value="Đăng Ký">
                        </div>
                    </div>
                </form>
                <div class="auth-from__socails">
                    <a href="" class="auth-from__socails-facebook btn btn--size-s btn--with-icon">
                        <i class="auth-from__socails-icon fa-brands fa-facebook-square"></i>
                        <span class="authu-from__socails-title authu-from__socails-face">
                            Kết nối với Facebook
                        </span>
                    </a>
                    <a href="" class="auth-from__socails-google btn btn--size-s btn--with-icon">
                        <img src="https://icon-library.com/images/icon-google/icon-google-22.jpg"
                         alt="" class="auth-from__socails-icon auth-from__socails-icon-google fa-brands fa-google">
                        <span class="authu-from__socails-title">
                            Kết nối với Google
                        </span>
                    </a>
                </div>
            </div> 
            <!-- login from -->
            <div class="auth-from js__form-login">
                <form action="index.php" method="POST">
                    <div class="auth-from__container">
                        <div class="auth-from__header">
                            <h3 class="auth-from__heading">Đăng Nhập</h3>
                            <input type="button" class="auth-from_swith-btn js-btn-register with-btn-2" Value="Đăng Ký">
                        </div>
                        <div class="auth-from__from">
                            <div class="auth-from__group">
                                <input type="text" name="email" class="autu-from__input" placeholder="Nhập Email">
                            </div>
                            <div class="auth-from__group">
                                <input type="password" name="password" class="autu-from__input" placeholder="Mật khẩu">
                            </div>
                        </div>
                        <div class="auth-from__aside">          
                            <div class="auth-from__help">
                                <a href="" class="auth-from__help-link auth-from__help-forgot">Quên mật khẩu</a>
                                <span class="auth-from__hlep-separate"></span>
                                <a href="" class="auth-from__help-link">Cần trợ giúp?</a>
                            </div>
                        </div>
                        <div class="auth-from-controls">
                            <input type="button" Value="TRỞ LẠI" class="btn auth-from-controls-back btn--normal js-back">
                            <button name="login"  class="btn btn--primary">ĐĂNG NHẬP</button>
                        </div>
                    </div>
                </form>
                <div class="auth-from__socails">
                    <a href="" class="auth-from__socails-facebook btn btn--size-s btn--with-icon">
                        <i class="auth-from__socails-icon fa-brands fa-facebook-square"></i>
                        <span class="authu-from__socails-title authu-from__socails-face">
                            Kết nối với Facebook
                        </span>
                    </a>
                    <a href="" class="auth-from__socails-google btn btn--size-s btn--with-icon">
                        <img src="https://icon-library.com/images/icon-google/icon-google-22.jpg"
                         alt="" class="auth-from__socails-icon auth-from__socails-icon-google fa-brands fa-google">
                        <span class="authu-from__socails-title">
                            Kết nối với Google
                        </span>
                    </a>
                </div>
            </div>
         </div> 
    </div>
    <script>
       const Btnregisters = document.querySelectorAll('.js-btn-register');
       const BtnLogins    = document.querySelectorAll('.js-btn-login');
       const modal = document.querySelector('.js__modal');
       const Fromregister = document.querySelector('.js__form-register');
       const Fromlogin = document.querySelector('.js__form-login');
       const Backs =document.querySelectorAll('.js-back');
       const Body = document.querySelector('.js__body')
       
       function showFromregister (){
           modal.classList.add('open')
           Fromlogin.classList.add('remove')
           Fromregister.classList.remove('remove')
       }

       function showFromlogin() {
           modal.classList.add('open')
           Fromlogin.classList.remove('remove')
           Fromregister.classList.add('remove')
       }

       function hidemodal() {
           modal.classList.remove('open')
       }
        function showbody (event) {
            event.stopPropagation()
        }

       for( Btnregister of Btnregisters) {
         Btnregister.addEventListener('click', showFromregister)    
       }
       
       for ( BtnLogin of BtnLogins) {
           BtnLogin.addEventListener('click', showFromlogin)
       }
       for( Back of Backs ) {
           Back.addEventListener('click', hidemodal)
       }
       
       modal.addEventListener('click', hidemodal)
       Body.addEventListener('click', showbody)
       
    </script>  
</body>
</html>