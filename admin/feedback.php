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
<?php include '../classes/brand.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php include '../classes/customer.php';?>
<?php include_once '../helpers/format.php';?>
<?php
	$cs = new customer();
	$fm = new Format();
	if(isset($_GET['binhluanid'])){
        $id = $_GET['binhluanid']; 
        $delcomment = $cs->del_comment($id);
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
                                Phản Hồi
                            </h2>
                        </div>
                        <?php
                            if(isset($delcomment)){
                                echo $delcomment;
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
                                        <li class="list__body-th feedback-th">
                                            <input type="checkbox" class="list-checkbox"id="checkbox-all" name='checkAll[]' value="<?php echo $result['binhluan_id'] ?>">
                                        </li>
                                        <li class="list__body-th feedback-th">STT</li>
                                        <li class="list__body-th feedback-th">Tên Khách</li>
                                        <li class="list__body-th feedback-th">Email</li>
                                        <li class="list__body-th feedback-th">Phản Hổi</li>
                                        <li class="list__body-th feedback-th">Thao Tác</li>
                                    </ul>
                                    <div class="list__body-tbody">
                                <?php
                                $cmlist = $cs->show_comment();
                                if($cmlist){
                                    $i = 0;
                                    while($result = $cmlist->fetch_assoc()){
                                        $i++;
                                ?>
                                        <ul class="list__body-tr">
                                            <li class="list__body-td feedback-td"><input class= "list-checkbox" type="checkbox" id="checkItem" name='check[]' value="<?php echo $result['binhluan_id'] ?>"></li>
                                            <li class="list__body-td feedback-td"><?php echo $i ?></li>
                                            <li class="list__body-td feedback-td"><?php echo $result['tenbinhluan'] ?></li>
                                            <li class="list__body-td feedback-td"><?php echo $result['email_bl'] ?></li>
                                            <li class="list__body-td feedback-td"><?php echo $result['binhluan'] ?></li>
                                            <li class="list__body-td feedback-td">
                                                <a href="?binhluanid=<?php echo $result['binhluan_id'] ?>" class="list__body-link">Xóa</a>
                                            </li>
                                       </ul> 
                                       <?php
                                            }}
                                            ?>
                                    </div>
                                </div>
                                <?php
                                    $cs = new customer();
                                if(isset($_POST['save'])){
    
                                    if(isset($_POST['checkbox-all']) || isset($_POST['check'])){
                                        foreach($_POST['check'] as $id)
                                        {
                                            $cs->del_comment($id);
                                            echo '<META HTTP-EQUIV="Refresh" Content="0; ">';
                                            echo "<script>alert('Đã Xóa')</script>";
                                            
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
        $('.list__body').dataTable();
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