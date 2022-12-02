<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.1.1/css/all.css">
    <link rel="stylesheet" href="./assets/css/list.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel="stylesheet">
    <title>Quản Lý Cở Sở Dữ Liệu</title>
</head>
<body>
<?php 

$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../classes/cart.php');
include_once ($filepath.'/../helpers/format.php');

?>
<?php
	$ct = new cart();
	if(isset($_GET['shiftid'])){
     	$id = $_GET['shiftid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted = $ct->shifted($id,$time,$price);
    }

    if(isset($_GET['delid'])){
     	$id = $_GET['delid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$del_shifted = $ct->del_shifted($id,$time,$price);
    }
?>
<?php
    include 'header_admin.php'
    ?>
    <div class="container__admin">
        <div class="grid_full-width">
            <div class="grid__row">
                <?php include 'sidebar.php';?>
                <div class="grid__column-10 container__body">
                    <div class="list">
                        <div class="container__heading">
                            <h2 class="container__title">
                                Danh Sách Đơn Hàng
                            </h2>
                        </div>
                        <div class="list__search">
                            <span class="list__search-title">
                                Search
                            </span>
                            <input type="text" class="list__input">
                        </div>
                                <?php 
                                if(isset($shifted)){
                                    echo $shifted;
                                }

                                ?>  
                                <?php 
                                if(isset($del_shifted)){
                                    echo $del_shifted;
                                }
                                
                                ?>  
                        <div class="order">
                            <div class="order__list">
                                <ul class="order__list__body-thead">
                                    <li class="order__list__body-th">STT</li>
                                    <li class="order__list__body-th">Sản Phẩm </li>
                                    <li class="order__list__body-th">Thời Gian Đặt Hàng</li>
                                    <li class="order__list__body-th">Số Lượng</li>
                                    <li class="order__list__body-th">Đơn Giá</li>
                                    <li class="order__list__body-th">Mã Khách</li>
                                    <li class="order__list__body-th">Địa Chỉ</li>
                                    <li class="order__list__body-th">Trạng Thái</li>
                                    <li class="order__list__body-th">Thao Tác</li>
                                </ul>
                                <div class="order__list__body-tbody">
                                            <?php
                                    $ct = new cart();
                                    $fm = new Format();
                                    $get_inbox_cart = $ct->get_inbox_cart();
                                    if($get_inbox_cart){
                                        $i = 0;
                                        $subtotal = 0;
                                        $qty = 0;
                                        while($result = $get_inbox_cart->fetch_assoc()){
                                            $i++;
                                            $total = $result['price']*$result['quantity'];
                                            $subtotal += $total;
                                            $qty = $qty + $result['quantity'];
                                    ?>
						
                                    <ul class="order__list__body-tr">
                                        <li class="order__list__body-td"><?php echo $i; ?></li>
                                        <li class="order__list__body-td"><?php echo $result['productName'] ?></li>
                                        <li class="order__list__body-td"><?php echo $fm->formatDate($result['date_order']) ?></li>
                                        <li class="order__list__body-td"><?php echo $result['quantity'] ?></li>
                                        <li class="order__list__body-td">
                                        <?php 
                                            $giam = $subtotal * 0.1;
                                            $sum_order =$subtotal - $giam;
                                            echo $fm->format_currency($sum_order)." "."VNĐ";
                                            Session::set('sum',$subtotal);
                                            Session::set('qty',$qty);
                                            ?></li>
                                        <li class="order__list__body-td"><?php echo $result['customer_id'] ?></li>
                                        <li class="order__list__body-td">
                                            <a href="customer.php?customerid=<?php echo $result['customer_id'] ?>"class="order__list__body-td-link">
                                                Xem Khách
                                            </a>
                                        </li>
                                        <li class="order__list__body-td">
                                                        <?php 
                                            if($result['status']==0){
                                            ?>

                                                <a  class="order__list__body-td-link xacnhan" href="?shiftid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Chờ xác nhận</a>

                                                <?php
                                            }elseif($result['status']==1){
                                                ?>
                                                <?php
                                                echo '<span class="xacnhan">Đã xác nhận</span>';
                                                ?>
                                        <?php
                                        }elseif($result['status']==2){
                                        ?>
                                         <div style="display:flex; justify-content: space-between;">
                                             <span class= "xacnhan">Đơn hàng đã giao</span>
                                             <a class="order__list__body-td-link" href="?delid=<?php echo $result['id'] ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Xóa</a>
                                         </div>
                                        </li>
                                            <?php
                                                }
                                            
                                            ?>
                                   </ul>
                                    <?php
                                    }}
                                        ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php'
    ?>
    <script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.order').dataTable();
        setSidebarHeight();
    });
</script>
</body>
</html>