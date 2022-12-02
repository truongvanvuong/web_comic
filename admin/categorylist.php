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
            if(isset($_POST['delid'])){

              if(isset($_POST['checkbox-all']) || isset($_POST['check'])){
                foreach($_POST['check'] as $id)
                {
                    $id = $_GET['delid']; 
                    $delcat = $cat->del_category($id);
              header('Location: categorylist.php').
              $message="Đã Xóa";
            
            }
              }
              else{
                echo "<script>alert('Hãy Chọn Mục Cần Xóa')</script>";	}
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
                                Danh Sách Danh Mục
                            </h2>
                        </div>
                            <?php include '../classes/category.php' ?>
                            <?php
                            $cat = new category();
                            if(isset($_GET['delid'])){
                                $id = $_GET['delid']; 
                                $delcat = $cat->del_category($id);
                            }?>
                            <?php
                            if(isset($delcat)){
                            echo $delcat;
                            }
                            ?> 
                        <div class="list__search">
                            <span class="list__search-title">
                                Search
                            </span>
                            <input type="text" class="list__input">
                        </div>
                        <form action="" method="post">
                            <div class="list__body">
                                <div class="list__body-table">
                                    <ul class="list__body-thead">
                                        <li class="list__body-th">
                                            <input type="checkbox" class="list-checkbox" id="checkbox-all"  value="<?php echo $result['catId'] ?>">
                                        </li>
                                        <li class="list__body-th">STT</li>
                                        <li class="list__body-th">Tên Danh Mục</li>
                                        <li class="list__body-th">Thao Tác</li>
                                    </ul>
                                    <div class="list__body-tbody">
                                    <?php
                                        $show_cate = $cat->show_category();
                                        if($show_cate){
                                            $i = 0;
                                            while($result = $show_cate->fetch_assoc()){
                                                $i++;
                                    ?>
                                        <ul class="list__body-tr">
                                            <li class="list__body-td">
                                                <input class= "list-checkbox" type="checkbox"name="check[]"  value="<?php echo $result['catId'] ?>"></li>
                                            <li class="list__body-td"><?php echo $i; ?></li>
                                            <li class="list__body-td upcase"><?php echo $result['catName'] ?></li>
                                            <li class="list__body-td">
                                                <a href="categroyedit.php?catid=<?php echo $result['catId'] ?>" class="list__body-link">Sửa</a>
                                                <a onclick = "return confirm('Bạn có chắc chắn muốn xóa danh mục không?')" href="?delid=<?php echo $result['catId'] ?>" class="list__body-link list__body-link-seperate">Xóa</a>
                                            </li>
                                       </ul>
                                       <?php
                                        }
                                            }
                                            ?>
                                    </div>
                                </div>
                                <?php
                                     $cat = new category();
                                    if(isset($_POST['save'])){

                                    if(isset($_POST['checkbox-all']) || isset($_POST['check'])){
                                        foreach($_POST['check'] as $id)
                                        {
                                           $cat->del_category($id);
                                           echo '<META HTTP-EQUIV="Refresh" Content="0;">';
                                    }
                                    }
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