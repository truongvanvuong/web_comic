<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/productadd.css">
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
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
    $pd = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $insertProduct = $pd->insert_product($_POST,$_FILES);
        
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
                    <div class="container__heading">
                        <h2 class="container__title">
                            Thêm Truyện
                        </h2>
                    </div>
                    <?php

                        if(isset($insertProduct)){
                            echo $insertProduct;
                        }

                        ?>
                    <form action="productadd.php" method="post">
                        <div class="product">
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Tên Truyện
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Nhập tên..." name="productName" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Tác Giả
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Tác giả..." name="author" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Họa Sĩ
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Họa sĩ..." name="painter" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Nhà Cung Cấp
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Nhà cung cấp..." name="supplier" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Tải Ảnh Lên
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input type="file" name="image" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Thể Loại
                                    </span>
                                </li>
                                <li class="product-item">
                                    <select class="product-item-select" id="select" name="category"> 
                                        <option style ="text-transform: uppercase;" class="product-item-option" value=""> Chọn</option>
                                        <?php
                                        $cat = new category();
                                        $catlist = $cat->show_category();

                                        if($catlist){
                                            while($result = $catlist->fetch_assoc()){
                                        ?>

                                        <option style ="text-transform: uppercase;"value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>

                                        <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Nhà Xuất Bản
                                    </span>
                                </li>
                                <li class="product-item">
                                    <select class="product-item-select" id="select" name="brand"> 
                                        <option  style ="text-transform: uppercase;" class="product-item-option" value=""> Chọn nhà xuất bản</option>
                                                    <?php
                                        $brand = new brand();
                                        $brandlist = $brand->show_brand();

                                        if($brandlist){
                                            while($result = $brandlist->fetch_assoc()){
                                        ?>

                                        <option style="text-transform: uppercase;" value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>

                                        <?php
                                            }
                                        }
                                    ?>
                                    </select>
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Mô Tả
                                    </span>
                                </li>
                                <li class="product-item">
                                    <textarea name="product_desc" id="" rows="8" required id="" placeholder="Mô tả..." class="product-item-describe"></textarea>
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Giá Niêm Yết
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input type="number"  name="listed_price" min ="0" required id="" placeholder="Nhập giá niêm yết... " class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Giá Bán
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input type="number"  name="price" min ="0" required id="" placeholder="Nhập giá bán... " class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Xếp Loại
                                    </span>
                                </li>
                                <li class="product-item">
                                    <select class="product-item-select" id="select" name="type"> 
                                        <option class="product-item-option">Loại Xếp Hạng</option>
                                        <option class="product-item-option" value="0"> Phổ biến</option>
                                        <option class="product-item-option" value="1"> Mới nhất</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="product__add-btn">
                            <input class="btn btn__add" type="submit" name="submit" Value="Lưu"></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php'
    ?>
</body>
</html>