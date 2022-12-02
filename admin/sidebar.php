<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/font/fontawesome-free-6.1.1/css/all.css">
    <link rel = "preconnect" href = "https://fonts.googleapis.com">
    <link rel = "preconnect" href = "https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="./assets/font/fontawesome-free-6.1.1/css/all.min.css">
    <link href ="https://fonts.googleapis.com/css2? family = Roboto: wght @ 100 & display = swap" rel="stylesheet">
    <title>Quản Lý Cở Sở Dữ Liệu</title>
</head>
<body>
    <div class="grid__column-2">
        <div class="sidebar">
            <div class="sidebar__menu">
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item">
                        <span class="sidebar__menu-title">
                            Danh Mục
                        </span>
                        <ul class="sidebar__menu-list-child active ">
                            <li class="sidebar__menu-item-child">
                                <a href="categroyadd.php" class="sidebar__menu-item-link">
                                    Thêm danh mục
                                </a>
                            </li>
                            <li class="sidebar__menu-item-child">
                                <a href="categorylist.php" class="sidebar__menu-item-link">
                                    Liệt kê danh mục
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item">
                        <span class="sidebar__menu-title">
                            Nhà Xuất Bản
                        </span>
                        <ul class="sidebar__menu-list-child ">
                            <li class="sidebar__menu-item-child">
                                <a href="bandadd.php" class="sidebar__menu-item-link">
                                    Thêm nhà xuất bản
                                </a>
                            </li>
                            <li class="sidebar__menu-item-child">
                                <a href="bandlist.php" class="sidebar__menu-item-link">
                                    Liệt kê nhà xuất bản
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item">
                        <span  class="sidebar__menu-title">
                            Truyện
                        </span>
                        <ul class="sidebar__menu-list-child ">
                            <li class="sidebar__menu-item-child">
                                <a href="productadd.php" class="sidebar__menu-item-link">
                                    Thêm truyện
                                </a>
                            </li>
                            <li class="sidebar__menu-item-child">
                                <a href="productlist.php" class="sidebar__menu-item-link">
                                    Liệt kê truyện
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item">
                        <span class="sidebar__menu-title">
                            Đơn Hàng
                        </span>
                        <ul class="sidebar__menu-list-child ">
                            <li class="sidebar__menu-item-child">
                                <a href="order.php" class="sidebar__menu-item-link">
                                    Liệt kê đơn hàng
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <ul class="sidebar__menu-list">
                    <li class="sidebar__menu-item">
                        <span  class="sidebar__menu-title">
                            Phản Hồi
                        </span>
                        <ul class="sidebar__menu-list-child ">
                            <li id ="1" class="sidebar__menu-item-child">
                                <a href="feedback.php" class="sidebar__menu-item-link">
                                    Liệt kê phản hồi
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <script>
        const slideLis = document.querySelectorAll('.sidebar__menu-item');
        const ul = document.querySelectorAll('.sidebar__menu-list-child');
        const liActive = document.querySelector('.sidebar__menu-list-child.active');
        
        for(const slideLi of slideLis) {
            slideLi.addEventListener('click', () => {
                liActive.classList.remove('active');
                const ulChild = slideLi.querySelector('.sidebar__menu-list-child');
                ulChild.classList.add('active');
            })
        }
    </script>
</body>
</html>