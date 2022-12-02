<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comic</title>
</head>
<body>
    <?php include 'header.php' ?>
    <?php
	
	$login_check = Session::get('customer_login'); 
	if($login_check==false){
		header('Location:login.php');
	}
		
?>
<?php

 $id = Session::get('customer_id');
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
   
    $UpdateCustomers = $cs->update_customers($_POST, $id);
    
}
?>
    <div class="grid">
        <div class="grid__row">
            <div class="grid_full-width">
                <div class="profile">
                    <?php
						if(isset($UpdateCustomers)){
							echo '<td colspan="3">'.$UpdateCustomers.'</td>';
						}
						?>
                    <div class="profile__heading">
                        <h1 class="profile__heading-title">
                            Thông Tin Tài Khoản
                        </h1>
                    </div>
                    <form action="" method="post">
                        <div class="profie__body">
                                    <?php
                                $id = Session::get('customer_id');
                                $get_customers = $cs->show_customers($id);
                                if($get_customers){
                                    while($result = $get_customers->fetch_assoc()){
    
                                ?>
                            <ul class="profile__body-list">
                                <li class="profile__body-item-1">
                                 Họ Và Tên
                                </li>
                                <li class="dau">:</li>
                                <li class="profile__body-item-2">
                                    <input type="text" value="<?php echo $result['name'] ?>" name="name" class="profile__body-input">
                                </li>
                            </ul>
                            <ul class="profile__body-list">
                                <li class="profile__body-item-1">
                                 Số Điện Thoại
                                </li>
                                <li class="dau">:</li>
                                <li class="profile__body-item-2">
                                    <input type="text" name="phone" value="<?php echo $result['phone'] ?>" class="profile__body-input">
                                </li>
                            </ul>
                            <ul class="profile__body-list">
                                <li class="profile__body-item-1">
                                 Thành Phố
                                </li>
                                <li class="dau">:</li>
                                <li class="profile__body-item-2">
                                    <input type="text" name="country" value="<?php echo $result['country'] ?>"class="profile__body-input">
                                </li>
                            </ul>
                            <ul class="profile__body-list">
                                <li class="profile__body-item-1">
                                 Email
                                </li>
                                <li class="dau">:</li>
                                <li class="profile__body-item-2">
                                    <input type="text" name="email" value="<?php echo $result['email'] ?>" class="profile__body-input">
                                </li>
                            </ul>
                            <ul class="profile__body-list">
                                <li class="profile__body-item-1">
                                 Địa Chỉ
                                </li>
                                <li class="dau">:</li>
                                <li class="profile__body-item-2">
                                    <input type="text" name="address" value="<?php echo $result['address'] ?>"class="profile__body-input">
                                </li>
                            </ul>
                            <?php }}
                            ?>
                            <div class="profile__btn">
                                <button type="submit" name="save" class="btn btn--primary ">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>
    <?php include 'footer.php' ?>
</body>
</html>