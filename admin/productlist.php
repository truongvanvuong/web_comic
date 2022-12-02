<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.1.1/css/all.css">
    <link rel="stylesheet" href="./assets/css/productlist.css">
    <link rel="stylesheet" href="./assets/css/list.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel="stylesheet">
    <title>Quản Lý Cở Sở Dữ Liệu</title>
</head>
<body>
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$pd = new product();
	$fm = new Format();
	if(isset($_GET['productid'])){
        $id = $_GET['productid']; 
        $delpro = $pd->del_product($id);
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
                                Danh Sách Truyện
                            </h2>
                        </div>
                        <div class="list__search">
                            <span class="list__search-title">
                                Search
                            </span>
                            <input type="text" class="list__input">
                        </div>
                        <form action="" method="post">
                            <div class="product">
                                    <?php
                                    if(isset($delpro)){
                                        echo $delpro;
                                    }
                                    ?> 
                                <div class="product__list">
                                    <ul class="product__list__body-thead">
                                        <li class="product__list__body-th">
                                            <input type="checkbox" class="list-checkbox" id="checkbox-all" name='checkAll[]' value="<?php echo $result['productId'] ?>">
                                        </li>
                                        <li class="product__list__body-th">STT</li>
                                        <li class="product__list__body-th">Tên</li>
                                        <li class="product__list__body-th">Ảnh</li>
                                        <li class="product__list__body-th">Loại Sách</li>
                                        <li class="product__list__body-th">Nhà Xuất Bản</li>
                                        <li class="product__list__body-th">Giá Tiền</li>
                                        <li class="product__list__body-th">Thao Tác</li>
                                    </ul>
                                    <div class="product__list__body-tbody">
                                    <?php
                                    
                                    $pdlist = $pd->show_product();
                                    if($pdlist){
                                        $i = 0;
                                        while($result = $pdlist->fetch_assoc()){
                                            $i++;
                                    ?>
                                        <ul class="product__list__body-tr">
                                            <li class="product__list__body-td"><input class= "list-checkbox" type="checkbox" id="checkItem" name='check[]' value="<?php echo $result['productId'] ?>"></li>
                                            <li class="product__list__body-td"><?php echo $i ?></li>
                                            <li class="product__list__body-td"><?php echo $result['productName'] ?></li>
                                            <li class="product__list__body-td">
                                            <img class="product__list__body-td-img" src="assets/img/<?php echo $result['image'] ?>"></img>
                                            </li>
                                            <li class="product__list__body-td"><?php echo $result['catName'] ?></li>
                                            <li class="product__list__body-td"><?php echo $result['brandName'] ?></li>
                                            <li class="product__list__body-td"><?php echo $result['price'] ?></li>
                                            <li class="product__list__body-td">
                                                <a href="productedit.php?productid=<?php echo $result['productId'] ?>" class="product__list__body-link">Sửa</a>
                                                <a onclick = "return confirm('Bạn chắc chắn muốn xóa?')"  href="?productid=<?php echo $result['productId'] ?>" class="product__list__body-link list__body-link-seperate">Xóa</a>
                                            </li>
                                       </ul> 
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                    $pd = new product();
                                    if(isset($_POST['save'])){

                                    if(isset($_POST['checkbox-all']) || isset($_POST['check'])){
                                        foreach($_POST['check'] as $id)
                                        {
                                            echo '<META HTTP-EQUIV="Refresh" Content="0; ">';
                                             $pd->del_product($id);
                                    }}
                                    else{
                                        echo "<script>alert('Hãy Chọn Mục Cần Xóa')</script>";	}
                                    }
                                    ?>
                                <div class="delete__btn">
                                <button onclick = "return confirm('Bạn có chắc chắn muốn xóa những mục đã chọn?')" name="save"  class="btn btn-delete-all " type="submit"> Xóa </button>
                                </div>
                            </div>
                        </form>
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
        $('.product__list').dataTable();
		setSidebarHeight();
    });
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