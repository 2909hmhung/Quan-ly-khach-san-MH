<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý giao dịch";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header.php');

$querygiaodich = mysqli_query($conn, "SELECT * FROM `giaodich`, `giatien` WHERE `idphong`='" . ($_GET['phong']) . "' AND `giatien`.`idgiatien`=`giaodich`.`idgiatien` ORDER BY `thoigianbatdau` DESC LIMIT 1");
if ($querygiaodich && $querygiaodich->num_rows > 0)
    $giaodich = mysqli_fetch_assoc($querygiaodich);
else
    header("Location: ./them-giao-dich.php?phong=" . $_GET['phong']);
$querykhachhang = mysqli_query($conn, "SELECT * FROM `thongtinkhachhang` WHERE `sdt`='" . $giaodich['sdtkhachhang'] . "'");
$khachhang = mysqli_fetch_assoc($querykhachhang);

$querygia = mysqli_query($conn, "SELECT * FROM `giatien`");
$queryphong = mysqli_query($conn, "SELECT `tenphong` FROM `phong` WHERE `id`=" . $_GET['phong']);
$phong = mysqli_fetch_assoc($queryphong);
if (isset($_POST['submit'])) {
    $thanhtien = (int)$_POST['thanhtien']; // Xác thực là số
  
    $query = mysqli_query($conn, "UPDATE `giaodich` SET
      `thoigianketthuc` = '" . $_POST['thoigianketthuc'] . "',
      `giamgia` = '" . $_POST['giamgia'] . "',
      `idgiatien` = '" . $_POST['giatien'] . "',
      `tongtien` = " . $thanhtien . "
    WHERE `giaodich`.`sdtkhachhang` = '" . $_POST['khachhang'] . "' AND `giaodich`.`thoigianbatdau` = '" . $_POST['thoigianbatdau'] . "'");
  
    if ($query) {
      echo "<script>Swal.fire('Thành công!','Đã lưu thanh toán!','success').then(function(){window.location = './index.php';});</script>";
    } else {
      echo "<script>Swal.fire('Thất bại!','Đã có lỗi xảy ra!','error');</script>";
    }
/*if (isset($_POST['submit'])) {
    $query = mysqli_query($conn, "UPDATE `giaodich` SET `thoigianketthuc` = '" . $_POST['thoigianketthuc'] . "', `giamgia` = '" . $_POST['giamgia'] . "', `idgiatien` = '" . $_POST['giatien'] . "' WHERE `giaodich`.`sdtkhachhang` = '" . $_POST['khachhang'] . "' AND `giaodich`.`thoigianbatdau` = '" . $_POST['thoigianbatdau'] . "'");
    if ($query){
        echo "<script>Swal.fire('Thành công!','Đã lưu thanh toán!','success').then(function(){window.location = './index.php';});</script>";
    }
    else {
        echo "<script>Swal.fire('Thất bại!','Đã có lỗi xảy ra!','error');</script>";
    }*/
}
?>
<div class="row content-container">
    <div class="col-xl-12 mx-auto">

        <form method="post" action="">

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="idphong">ID Phòng:</label>
                        <input readonly type="number" class="form-control" id="idphong" name="idphong" value="<?= $_GET['phong'] ?>">
                    </div>
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="form-group">
                        <label for="tenphong">Tên Phòng:</label>
                        <input readonly type="text" class="form-control" id="tenphong" name="tenphong" value="<?= $phong['tenphong'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-md-4">
                    <div class="form-group">
                        <label for="khachhang">Khách hàng:</label>
                        <select readonly class="form-control" name="khachhang" id="khachhang" placeholder="Chọn khách hàng..">
                            <?php echo '<option value="' . $khachhang['sdt'] . '">' . $khachhang['hoten'] . '</option>';
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="loaikh">Loại khách hàng:</label>
                        <input readonly type="text" class="form-control" id="loaikh" name="loaikh" value="<?= $khachhang['loaikhachhang'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="thoigianbatdau">Thời gian bắt đầu:</label>
                        <input readonly type="text" class="form-control" id="thoigianbatdau" name="thoigianbatdau" value="<?= $giaodich['thoigianbatdau'] ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="thoigianketthuc">Thời gian kết thúc:</label>
                        <input type="text" class="form-control" id="thoigianketthuc" name="thoigianketthuc" value="<?= date("Y-m-d H:i:s", time()) ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="sogio">Số phút:</label>
                        <input readonly type="text" class="form-control" id="sogio" name="sogio" value="<?= ceil((time() - strtotime($giaodich['thoigianbatdau'])) / 60) ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="giatien">Giá tiền:</label>
                        <select class="form-control" name="giatien" id="giatien" placeholder="Chọn giá tiền..">
                            <?php
                            if ($querygia && $querygia->num_rows > 0) {
                                while ($giatien = mysqli_fetch_assoc($querygia)) {
                                    echo '<option value="' . $giatien['idgiatien'] . '" data-gia="' . $giatien['gia'] . '">' . $giatien['gia'] . '.000đ</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="giamgia">Giảm giá:</label>
                        <input type="text" class="form-control" id="giamgia" name="giamgia" value="<?= $giaodich['giamgia'] ?>">
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="thanhtien">Thành tiền:</label>
                        <input type="text" class="form-control" id="thanhtien" name="thanhtien" value="">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="ghichu">Ghi chú:</label>
                        <textarea class="form-control" name="ghichu" id="ghichu" cols="30" rows="5"><?= $giaodich['ghichu'] ?></textarea>
                    </div>
                </div>
            </div>

            <button name="submit" type="submit" class="btn btn-primary px-5"><i class="fa fa-money"></i> Thanh toán</button>
            <a href="./index.php" class="btn btn-danger px-5"><i class="fa fa-reply"></i> Trở về</a>
        </form>

    </div>
</div>
<script>
    function tinhtien() {
        $('#thanhtien').val(Math.ceil($('#sogio').val() / 60 * $('#giatien option:selected').data('gia') * (100 - $('#giamgia').val()) / 100) * 1000);
    }
    $(document).ready(function() {
        $('#giatien').val("<?= $giaodich['idgiatien'] ?>");

        tinhtien();
    });
    $('input').change(function() {
        $('#sogio').val(Math.ceil((Date.parse($('#thoigianketthuc').val()) - Date.parse($('#thoigianbatdau').val())) / 60000));
        tinhtien();
    });
    $('select').change(function() {
        tinhtien();
    });
</script>
<?php
require_once('./footer.php');
?>
