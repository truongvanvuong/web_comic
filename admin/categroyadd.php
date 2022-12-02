<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
      <link rel="stylesheet" href="../assets/font/fontawesome-free-6.1.1/css/all.css">
      <link rel = "preconnect" href = "https://fonts.googleapis.com">
      <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
      <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
      <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel="stylesheet">
    <title>Quản Lý Cở Sở Dữ Liệu</title>
    <style>
        .category__body{
            display: inline-grid;
            margin: 16px 0 0 16px;
        }
        .category__body-text{
            text-transform: uppercase;
            outline:none;
            padding:8px ;
            font-size: 1.3rem;
            width: 300px;
            height: 36px;
            margin : 12px 0;
        }
        .category__body-name{
            padding:8px 0;
            font-size: 1.6rem;
        }
        .btn.btn__add{
            padding: 8px 0;
            width: 80px;
            height: 32px;
            background-color: var(--blue-color);
            color : var(--white-color);
        }

    </style>
</head>
<body>
<?php include '../classes/category.php' ?>
<?php
    $cat = new category();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
       
        $insertCat = $cat->insert_category($catName);
        
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
                            Thêm Danh Mục
                        </h2>
                    </div>
                    <?php
                     if(isset($insertCat)){
                      echo $insertCat;
                      }
                      ?>
                    <form action="categroyadd.php" method="post">
                        <div class="category__body">
                            <span class="category__body-name">
                                Thêm Danh Mục
                            </span>
                            <input type="text" name="catName" class="category__body-text" required id="" placeholder=" Nhập tên danh mục">
                            <input class="btn btn__add" type="submit" name="submit" Value="Lưu">
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