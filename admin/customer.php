<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/list.css">
      <link rel="stylesheet" href="../assets/font/fontawesome-free-6.1.1/css/all.css">
      <link rel = "preconnect" href = "https://fonts.googleapis.com">
      <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
      <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel="stylesheet">
    <title>Quản Lý Cở Sở Dữ Liệu</title>
    <style>
    </style>
</head>
<body>
<?php

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/customer.php');
include_once ($filepath.'/../helpers/format.php');

 ?>
<?php
   
    if(!isset($_GET['customerid']) || $_GET['customerid']==NULL){
       echo "<script>window.location ='inbox.php'</script>";
    }else{
         $id = $_GET['customerid']; 
    }
     $cs = new customer();
  

?>
    <?php
    include 'header_admin.php'
    ?>
    <div class="container__admin">
        <div class="grid_full-width">
            <div class="grid__row">
                <?php include 'sidebar.php';?>
                <div class="grid__column-10 container__body">
                    <div class="container__heading">
                        <h2 class="container__title">
                            Thông Tin Khách Hàng
                        </h2>
                    </div>
                    <?php
                    $get_customer = $cs->show_customers($id);
                    if($get_customer){
                        while($result = $get_customer->fetch_assoc()){
                    ?>
                    <form action="" method="post">
                        <div class="customer">
                            <ul class="customer__list">
                                <li class="customer__item__title">Họ tên </li>
                                <li class="colon">:</li>
                                <li class="customer__item__info"><?php echo $result['name'] ?></li>
                            </ul>
                            <ul class="customer__list">
                                <li class="customer__item__title"> SĐT </li>
                                <li class="colon">:</li>
                                <li class="customer__item__info"> <?php echo $result['phone'] ?></li>
                            </ul>
                            <ul class="customer__list">
                                <li class="customer__item__title">Thành phố</li>
                                <li class="colon">:</li>
                                <li class="customer__item__info"> <?php echo $result['country'] ?></li>
                            </ul>
                            <ul class="customer__list">
                                <li class="customer__item__title">Địa chỉ</li>
                                <li class="colon">:</li>
                                <li class="customer__item__info"><?php echo $result['address'] ?></li>
                            </ul>
                            <ul class="customer__list">
                                <li class="customer__item__title">Email</li>
                                <li class="colon">:</li>
                                <li class="customer__item__info"><?php echo $result['email'] ?></li>
                            </ul>
                        </div>
                    </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php'
    ?>
</body>
</html>