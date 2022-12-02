<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.1.1/css/all.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel="stylesheet">
    <title>Quản Lý Cở Sở Dữ Liệu</title>
</head>
<body>
        <?php
        include 'header_admin.php';
        ?>
        <div class="container__admin">
            <div class="grid_full-width">
            <div class="grid__row">
                <?php include 'sidebar.php';?>
                <div class=" container__body grid__column-10">
                    <div class="container__admin__body">
                        <div class="container__heading">
                            <h2 class="container__title">
                                Bảng Quản Lý Cơ Sở Dữ Liệu
                            </h2>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <?php
        include 'footer.php'
        ?>
    </div>
</body>
</html>