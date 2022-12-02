<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/login.css">
    <title>Document</title>
</head>
<body>
<?php
	include '../classes/adminlogin.php';
?>
<?php
	$class = new adminlogin();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     	$adminUser = $_POST['adminUser'];
     	$adminPass = @md5($_POST['adminPass']);

     	$login_check = $class->login_admin($adminUser,$adminPass);
     	
	}
?>
    <div class="login">
        <div class="login__heading">
            <div class="login__heading-title">
                <h1 class="login__heading-name">
                    Đăng Nhập Quản Trị Viên
                </h1>
            </div>
        </div>
        <form action="login.php" method="post">
            <span><?php
                    if(isset($login_check)){
                        echo $login_check;
                    }
            ?></span>
            <div class="login__container">
                <div class="login__container-posters">
                    <img src="./assets/img/admin_img.jpg" alt="Ảnh" class="login__container-img">
                </div>
                <div class="login__container-form">
                    <div class="login__container-heading">
                        <h2 class="login__container-title">
                            Comic
                        </h2>
                    </div>
                    <div class="login__container-form-body">
                        <input type="text"  name="adminUser" required id="" class="login__container-from-input" placeholder="Tên đăng nhập">
                        <input type="password" name="adminPass"  required id="" class="login__container-from-input" placeholder="Mật khẩu">
                    </div>
                    <div class="login__container-btn">
                        <input type="submit" class="login__container-btn-login" value="Đăng nhập"></input>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>