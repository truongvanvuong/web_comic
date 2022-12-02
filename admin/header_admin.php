  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
      <link rel="stylesheet" href="./assets/css/header_admin.css">
      <link rel="stylesheet" href="../assets/css/base.css">
      <link rel="stylesheet" href="../assets/font/fontawesome-free-6.1.1/css/all.css">
      <link rel = "preconnect" href = "https://fonts.googleapis.com">
      <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
      <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel="stylesheet">
      <title>Quản Lý Cở Sở Dữ Liệu</title>
  </head>
   <body>
   <?php
    include '../lib/session.php';
    Session::checkSession();
?>
      <header class="header__admin">
            <div class="header__admin-title">
                <h1 class="header__admin-title-name">
                  Quản Lý Của Hàng
               </h1>
            </div>
            <div class="header__admin-info">
                <div class="header__admin-info-img">
                    <img src="http://hocwebgiare.com/thiet_ke_web_chuan_demo/bootstrap_login2/images/icon-user-default.png" alt="" class="header__admin-user--img">
                </div>
                <div class="header__admin-info-name">
                    <ul class="header__admin-user-name">
                        <li class="header__admin-user-name_login">Xin Chào <?php echo Session::get('adminName') ?></li>
                        <?php
                            if(isset($_GET['action']) && $_GET['action']=='logout'){
                                Session::destroy();
                            }
                            ?>
                        <li class="header__admin-user-name_login">
                            <a href="?action=logout"class="header__admin-user-name_login-link">
                                Đăng Xuất
                            </a>
                        </li>
                   </ul>
               </div>
            </div>
        </header>
        <div class="header__navbar">
            <ul class="header__navbar-list">
                <li class="header__navbar-item">
                    <a href="index.php" class="header__navbar-item-link">
                        <i class="header__navbar-item-icon fa-solid fa-chart-line"></i>
                        Bảng Điều Khiển
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="" class="header__navbar-item-link">
                        <i class="header__navbar-item-icon fa-regular fa-envelope"></i>
                            Hòm Thư
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="" class="header__navbar-item-link">
                        <i class="header__navbar-item-icon fa-solid fa-lock"></i>
                            Đổi Mật Khẩu
                    </a>
                </li>
                <li class="header__navbar-item">
                    <a href="../index.php" class="header__navbar-item-link">
                        <i class="header__navbar-item-icon fa-solid fa-shop"></i>
                            Xem Cửa Hàng
                    </a>
                 </li>
            </ul>
        </div>
  </body>
 </html>