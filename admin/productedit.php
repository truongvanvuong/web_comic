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

    if(!isset($_GET['productid']) || $_GET['productid']==NULL){
       echo "<script>window.location ='productlist.php'</script>";
    }else{
         $id = $_GET['productid']; 
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        
        $updateProduct = $pd->update_product($_POST,$_FILES, $id);
        
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
                            Sửa Thông Tin Truyện
                        </h2>
                    </div>
                    <?php

                if(isset($updateProduct)){
                    echo $updateProduct;
                }
                        ?>        
                    <?php
                    $get_product_by_id = $pd->getproductbyId($id);
                        if($get_product_by_id){
                            while($result_product = $get_product_by_id->fetch_assoc()){
                    ?> 
                    <form action="" method="post">
                        <div class="product">
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Tên Truyện
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Nhập tên..." name="productName" value="<?php echo  $result_product['productName']?>" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Tác Giả
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Tác giả..." name="author" value="<?php echo  $result_product['author']?>" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Họa Sĩ
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Họa sĩ..." name="painter" value="<?php echo  $result_product['painter']?>" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Nhà Cung Cấp
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input placeholder="Nhà cung cấp..." name="supplier" value="<?php echo  $result_product['supplier']?>" required id="" type="text" class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Tải Ảnh Lên
                                    </span>
                                </li>
                                <li class="product-item">
                                    <img src="assets/img/<?php echo $result_product['image'] ?>" width="90"><br>
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
                                        <option class="product-item-option" value=""> Chọn loại sách</option>
                                        <?php
                            $cat = new category();
                            $catlist = $cat->show_category();

                            if($catlist){
                                while($result = $catlist->fetch_assoc()){
                             ?>


                            <option style ="text-transform: uppercase;"
                            <?php
                            if($result['catId']==$result_product['catId']){ echo 'selected';  }
                            ?>

                             value="<?php echo $result['catId'] ?>"><?php echo $result['catName'] ?></option>
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
                                        Nhà Xuất bản
                                    </span>
                                </li>
                                <li class="product-item">
                                    <select class="product-item-select" id="select" name="brand"> 
                                        <option  class="product-item-option" value=""> Chọn nhà xuất bản</option>
                                        <?php
                                        $brand = new brand();
                                        $brandlist = $brand->show_brand();

                                        if($brandlist){
                                            while($result = $brandlist->fetch_assoc()){
                                        ?>

                                        <option style ="text-transform: uppercase;"

                                        <?php
                                        if($result['brandId']==$result_product['brandId']){ echo 'selected';  }
                                        ?>

                                        value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>

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
                                <textarea name="product_desc" rows="8" required id="" placeholder="Mô tả..." class="product-item-describe"><?php echo $result_product['product_desc'] ?></textarea>
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Giá Niêm Yết
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input type="number" readonly="readonly" value="<?php echo $result_product['listed_price'] ?>"  name="listed_price" min ="0" required id="" placeholder="Nhập giá niêm yết... " class="product-item-input">
                                </li>
                            </ul>
                            <ul class="product__add">
                                <li class="product-item">
                                    <span class="product-item-title">
                                        Giá bán
                                    </span>
                                </li>
                                <li class="product-item">
                                    <input type="number"value="<?php echo $result_product['price'] ?>"  name="price" min ="0" required id="" placeholder="Nhập giá bán... " class="product-item-input">
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
                                        <?php
                                        if($result_product['type']==0){
                                        ?>
                                        <option class="product-item-option" selected value="0"> Phổ biến</option>
                                        <option class="product-item-option" value="1"> Mới nhất</option>
                                        <?php
                                        }else{
                                            ?>
                                        <option class="product-item-option" value="0"> Phổ biến</option>
                                        <option class="product-item-option" selected value="1"> Mới nhất</option>
                                        <?php
                                            }
                                            ?>
                                    </select>
                                </li>
                            </ul>
                        </div>
                        <div class="product__add-btn">
                            <input class="btn btn__add" type="submit" name="submit" Value="Cập Nhật"></input>
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