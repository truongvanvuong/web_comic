<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/container.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap"rel ="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="grid">
            <?php include 'silde.php'?>
            <div class="grid__row app__conten">
                <div class="grid__column-2">
                    <nav class="category">
                        <h3 class="category__heading">
                            <i class="category__heading-icon fa-solid fa-bars"></i>
                            Danh mục
                        </h3>
                        <ul class="category-list">
                        <?php
	        	       $cate = $cat->show_category();
                        if($cate){
                            while($result_new = $cate->fetch_assoc()){

                        ?>
                            <li class="category-item">
                                <a href="productbycat.php?catid=<?php echo $result_new['catId'] ?>"class="category-item__link"><?php echo $result_new['catName'] ?></a>
                            </li>
                            <?php
                                }
                            } 
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="grid__column-10">
                    <div class="home-filter">
                        <span class="home-filter__label">
                            Sắp xếp theo
                        </span>
                        <button class="btn home-filter__btn js__btn-common">Phổ Biến</button>
                        <button class="btn home-filter__btn btn--primary js__btn-new">Mới nhất</button>
                        <!-- <button class="btn home-filter__btn">Bán chạy</button> -->
                        <div class="select-input">
                            <span class="select-input__label">Giá</span>
                            <i class=" select-input__icon fa-solid fa-angle-down"></i>
                            <ul class="select-input__list">
                                <li class="seclect-input_item">
                                    <a href="product_lowtohigh.php" class="select-input__link">
                                        Từ thấp đến cao
                                    </a>
                                </li>
                                <li class="seclect-input_item">
                                    <a href="product_hightolow.php" class="select-input__link">
                                        Từ cao đến thấp
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="home-filter__page">
                            <span class="home-filter__page-num">
                                <span class="home-filter__page-current">1</span>/1
                            </span>
                            <div class="home-filter__page-control">
                                <a href="#" class="home-filter__page-btn home-filter__page-btn--disabled">
                                    <i class="home-fiter__page-icon fa-solid fa-angle-left"></i>
                                </a>
                                <a href="#" class="home-filter__page-btn home-filter__page-btn--disabled">
                                    <i class="home-fiter__page-icon fa-solid fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="home-product-new js__new">
                        <div class="grid__row">
                                <?php
                                $product_new = $product->getproduct_new();
                                if($product_new){
                                    while($result_new = $product_new->fetch_assoc()){

                                ?>
                            <div class="grid__column-2-4">
                                <a class="home-product-item" href="viewproduct.php?proid=<?php echo $result_new['productId'] ?>">
                                    <img class="home-product-item--img" src="admin/assets/img/<?php echo $result_new['image'] ?>" alt=""></img>
                                    <h4 class="home-product__name"><?php echo $result_new['productName'] ?></h4>
                                    <div class="home-product__price">
                                        <span class="home-product__price-old">    <?php echo $fm->format_currency($result_new['listed_price']).""."đ" ?></span>
                                        <span class="home-product__price-current"><?php echo $fm->format_currency($result_new['price'])." "."VNĐ" ?></span>
                                    </div>
                                    <div class="home-product-item__action">
                                        <span class="home-product-item__like home-product-item__like--liked">
                                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                            <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class=" fa-solid fa-star"></i>
                                        </div>
                                        <!-- <span class="home-product-item__sold">
                                            0 đã bán
                                        </span> -->
                                    </div>
                                    <div class="home-product-item__origin">
                                        <span style ="text-transform: uppercase;"class="home-product-item__brand"><?php echo $result_new['brandName'] ?></span>
                                        <span style ="text-transform: uppercase;"class="home-product-item__origin--name"><?php echo $result_new['catName'] ?></span>
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fa-solid fa-check"></i>
                                        <span>yêu thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__percent">10%</span>
                                        <span class="home-product-item__label">Giảm</span>
                                    </div>
                                </a>
                            </div>
                                <?php
                                        }
                                    }
                                    ?>
                        </div>
                    </div>
                    <div class="home-product_common js__common">
                        <div class="grid__row">
                        <?php
                            $product_feathered = $product->getproduct_feathered();
                            if($product_feathered){
                            while($result = $product_feathered->fetch_assoc()){

                            ?>
                            <div class="grid__column-2-4">
                                <a class="home-product-item" href="viewproduct.php?proid=<?php echo $result['productId'] ?>">
                                    <img class="home-product-item--img" src="admin/assets/img/<?php echo $result['image'] ?>" alt=""></img>
                                    <h4 class="home-product__name"><?php echo $result['productName'] ?></h4>
                                    <div class="home-product__price">
                                        <span class="home-product__price-old">    <?php echo $fm->format_currency($result['listed_price']).""."đ" ?></span>
                                        <span class="home-product__price-current"><?php echo $fm->format_currency($result['price'])." "."VNĐ" ?></span>
                                    </div>
                                    <div class="home-product-item__action">
                                        <span class="home-product-item__like home-product-item__like--liked">
                                            <i class="home-product-item__like-icon-empty fa-regular fa-heart"></i>
                                            <i class="home-product-item__like-icon-fill fa-solid fa-heart"></i>
                                        </span>
                                        <div class="home-product-item__rating">
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class="home-product-item__star--gold fa-solid fa-star"></i>
                                            <i class=" fa-solid fa-star"></i>
                                        </div>
                                        <!-- <span class="home-product-item__sold">
                                            0 đã bán
                                        </span> -->
                                    </div>
                                    <div class="home-product-item__origin">
                                        <span class="home-product-item__brand"><?php echo $result['brandName'] ?></span>
                                        <span class="home-product-item__origin--name"><?php echo $result['catName'] ?></span>
                                    </div>
                                    <div class="home-product-item__favourite">
                                        <i class="fa-solid fa-check"></i>
                                        <span>yêu thích</span>
                                    </div>
                                    <div class="home-product-item__sale-off">
                                        <span class="home-product-item__percent">10%</span>
                                        <span class="home-product-item__label">Giảm</span>
                                    </div>
                                </a>
                            </div>
                                <?php
                                    }
                                    }
                                ?>
                        </div>
                    </div>
                    <ul class="pagination home-product__pagination">
                        <li class="pagination-item ">
                            <a href="" class="pagination-item-link">
                                <i class="pagination-item__icon fa-solid fa-angle-left"></i>
                            </a>
                        </li>
                        <?php
                            if(isset($_GET['trang'])){
                                $trang = $_GET['trang'];
                            }else{
                                $trang = 1;
                            }
                            $product_all = $product->get_all_product(); 
                            $product_count = mysqli_num_rows($product_all);
                            $product_button = ceil($product_count/4);
                            $i = 1;
                            for($i=1;$i<=2;$i++){
                        ?>
                        <li class="pagination-item ">
                                <a href="index.php?trang=<?php echo $i ?>" <?php if($i==$trang){ echo 'style="background-color: var(--primary-color);color: var(--white-color);"';}?> class="pagination-item-link"><?php echo $i ?></a>
                        </li>
                        <?php
                        }
                        ?>
                        <li class="pagination-item">
                            <a href=""class="pagination-item-link">
                                <i class="pagination-item__icon fa-solid fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <script>
        const Btncommon = document.querySelector(".js__btn-common")
        const Btnnew = document.querySelector(".js__btn-new")
        const Homenew = document.querySelector(".js__new")
        const Homecommon = document.querySelector(".js__common")

        function showcommon(){
            Homecommon.classList.add('open')
            Homenew.classList.add('close')
            Btncommon.classList.add('btn--primary')
            Btnnew.classList.remove('btn--primary')
        }
        function shownew(){
            Homecommon.classList.remove('open')
            Homenew.classList.remove('close')
            Btncommon.classList.remove('btn--primary')
            Btnnew.classList.add('btn--primary')
        }
        Btncommon.addEventListener('click', showcommon)
        Btnnew.addEventListener('click', shownew)   
   </script>
</body>
</html>