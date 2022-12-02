<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./assets/css/myorder.css">
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
	if(isset($_GET['confirmid'])){
     	$id = $_GET['confirmid'];
     	$time = $_GET['time'];
     	$price = $_GET['price'];
     	$shifted_confirm = $ct->shifted_confirm($id,$time,$price);
    }
?>
    <div class="grid">
        <div class="grid__row">
            <div class="grid_full-width">
                <div class="myorder">
                    <div class="myorder__heading">
                        <span class="myorder__heaing-title"> Tình Trạng Đơn Hàng</span>
                    </div>
                    <div class="myorder__body">
                        <table class="myorder__table">
                            <thead class="myorder_th">
                                <tr>
                                    <th class="myorder__table-th">STT</th>
                                    <th class="myorder__table-th">Sản Phẩm</th>
                                    <th class="myorder__table-th">Ảnh</th>
                                    <th class="myorder__table-th">Giá</th>
                                    <th class="myorder__table-th">Số Lượng</th>
                                    <th class="myorder__table-th">Thời Gian</th>
                                    <th class="myorder__table-th">Trạng thái</th>
                                    <th class="myorder__table-th">Thao Tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
							$customer_id = Session::get('customer_id');
							$get_cart_ordered = $ct->get_cart_ordered($customer_id);
							if($get_cart_ordered){
								$i = 0;
								$subtotal = 0;
                                $qty = 0;

								while($result = $get_cart_ordered->fetch_assoc()){
									$i++;
									$total = $result['price']*$result['quantity'];
                                    $subtotal += $total;
                                                $qty = $qty + $result['quantity'];
							?>
                                <tr class="myorder__tr">
                                    <td class="myorder__table-td"><?php echo $i; ?></td>
                                    <td class="myorder__table-td"><?php echo $result['productName'] ?></td>
                                    <td class="myorder__table-td">
                                        <img src="admin/assets/img/<?php echo $result['image'] ?>" class="myorder__img">
                                    </td>
                                    <td class="myorder__table-td">
                                    <?php 
                                            $giam = $subtotal * 0.1;
                                            $sum_order =$subtotal - $giam;
                                            echo $fm->format_currency($sum_order)." "."VNĐ";
                                            Session::set('sum',$subtotal);
                                            Session::set('qty',$qty);
                                            ?>
                                    </td>
                                    <td class="myorder__table-td"><?php echo $result['quantity'] ?></td>
                                    <td class="myorder__table-td"><?php echo $fm->formatDate($result['date_order']) ?></td>
                                    <td class="myorder__table-td">
                                    <?php
									if($result['status']=='0'){
										echo 'Đang xử lý';
									}elseif($result['status']==1){ 
									?>
									<span>Đã xác nhận</span>
									
									<?php
									}elseif($result['status']==2){
										echo 'Đơn hàng đã giao';
									}

									 ?>
                                    </td>
                                    
                                                <?php
                                            if($result['status']=='0'){
                                            ?>
                                            <td class="myorder__table-td"><?php echo 'N/A';?></td>
                                            <?php
                                            
                                            }elseif($result['status']=='1'){
                                            
                                            ?>
                                            <td class="myorder__table-td"><a class="myorder__link" href="?confirmid=<?php echo $customer_id ?>&price=<?php echo $result['price'] ?>&time=<?php echo $result['date_order'] ?>">Đã Nhận Hàng</a></td>
                                            <?php
                                        }else{
                                            ?>
                                            <td class="myorder__table-td"><?php echo 'Đã xác nhận'; ?></td>
                                            <?php
                                            }	
                                            ?>
                                    
                                </tr>
                                <?php
                               
                                 }
                             }
						?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>
</html>