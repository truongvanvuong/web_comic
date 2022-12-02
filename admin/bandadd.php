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
        .band__body{
            display: inline-grid;
            margin: 16px 0 0 16px;
        }
        .band__body-text{
            text-transform: uppercase;
            outline:none;
            padding:8px ;
            font-size: 1.3rem;
            width: 300px;
            height: 36px;
            margin : 12px 0;
        }
        .band__body-name{
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
    <?php
    include 'header_admin.php'
    ?>
    <?php include '../classes/brand.php' ?>
    <?php
    $brand = new brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];
        $insertBrand = $brand->insert_brand($brandName);
        
    }
?> 
    <div class="container__admin">
        <div class="grid_full-width">
            <div class="grid__row">
                <?php include 'sidebar.php';?>
                <div class="grid__column-10 container__body">
                    <div class="container__heading">
                        <h2 class="container__title">
                            Thêm Nhà Xuất Bản
                        </h2>
                    </div>
                    <?php
                    if(isset($insertBrand)){
                        echo $insertBrand;
                    }
                    ?>
                    <form action="bandadd.php" method="post">
                        <div class="band__body">
                            <span class="band__body-name">
                                Thêm nhà xuất bản
                            </span>
                            <input type="text"  name="brandName" class="band__body-text" required id="" placeholder=" Nhập tên nhà xuất bản">
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