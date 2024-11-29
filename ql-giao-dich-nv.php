<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý giao dịch";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header-nv.php');

$querygiaodich = mysqli_query($conn, "SELECT * FROM `giaodich`, `giatien` WHERE `idmay`='" . ($_GET['may']) . "' AND `giatien`.`idgiatien`=`giaodich`.`idgiatien` ORDER BY `thoigianbatdau` DESC LIMIT 1");
if ($querygiaodich && $querygiaodich->num_rows > 0)
    $giaodich = mysqli_fetch_assoc($querygiaodich);
else
    header("Location: ./them-giao-dich.php?may=" . $_GET['may']);
$querykhachhang = mysqli_query($conn, "SELECT * FROM `thongtinkhachhang` WHERE `sdt`='" . $giaodich['sdtkhachhang'] . "'");
$khachhang = mysqli_fetch_assoc($querykhachhang);

$querygia = mysqli_query($conn, "SELECT * FROM `giatien`");
$querymay = mysqli_query($conn, "SELECT `tenmay` FROM `maytinh` WHERE `id`=" . $_GET['may']);
$maytinh = mysqli_fetch_assoc($querymay);
if (isset($_POST['submit'])) {
    $query = mysqli_query($conn, "UPDATE `giaodich` SET `thoigianketthuc` = '" . $_POST['thoigianketthuc'] . "', `giamgia` = '" . $_POST['giamgia'] . "', `idgiatien` = '" . $_POST['giatien'] . "' WHERE `giaodich`.`sdtkhachhang` = '" . $_POST['khachhang'] . "' AND `giaodich`.`thoigianbatdau` = '" . $_POST['thoigianbatdau'] . "'");
    if ($query){
        echo "<script>Swal.fire('Thành công!','Đã lưu thanh toán!','success').then(function(){window.location = './index-nv.php';});</script>";
    }
    else {
        echo "<script>Swal.fire('Thất bại!','Đã có lỗi xảy ra!','error');</script>";
    }
}
?>
<div class="row content-container">
    <div class="col-xl-12 mx-auto">

        <form method="post" action="">

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="idmay">ID máy:</label>
                        <input readonly type="number" class="form-control" id="idmay" name="idmay" value="<?= $_GET['may'] ?>">
                    </div>
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="form-group">
                        <label for="tenmay">Tên máy:</label>
                        <input readonly type="text" class="form-control" id="tenmay" name="tenmay" value="<?= $maytinh['tenmay'] ?>">
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
            <a href="./index-nv.php" class="btn btn-danger px-5"><i class="fa fa-reply"></i> Trở về</a>
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
