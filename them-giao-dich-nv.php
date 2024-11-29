<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý giao dịch";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header-nv.php');
$querykhachhang = mysqli_query($conn, "SELECT * FROM thongtinkhachhang ORDER BY thoigiandangky DESC");
$querygia = mysqli_query($conn, "SELECT * FROM `giatien` WHERE 1 ORDER BY `idgiatien` DESC");
$queryphong = mysqli_query($conn, "SELECT `tenphong` FROM `phong` WHERE `id`=" . $_GET['phong']);
$phong = mysqli_fetch_assoc($queryphong);
if (isset($_POST['submit'])) {
    $query = mysqli_query($conn, "INSERT INTO `giaodich` (`sdtkhachhang`, `idphong`, `idgiatien`, `thoigianbatdau`, `giamgia`, `ghichu`) VALUES ('" . $_POST['khachhang'] . "', '" . $_POST['idphong'] . "', '" . $_POST['giatien'] . "', '" . $_POST['thoigianbatdau'] . "', '" . $_POST['giamgia'] . "', '" . $_POST['ghichu'] . "');");
    if ($query) {
        echo "<script>Swal.fire('Thành công!','Đã lưu thông tin giao dịch!','success').then(function(){window.location = './index-nv.php';});</script>";
    } else {
        echo "<script>Swal.fire('Thất bại!','Không thể lưu thông tin giao dịch!','error');</script>";
    }
}

?>
<div class="row content-container">
    <div class="col-xl-8 mx-auto">
        <form method="post" action="">

            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="idphong">ID máy:</label>
                        <input type="number" readonly class="form-control" id="idphong" name="idphong" value="<?= $_GET['phong'] ?>">
                    </div>
                </div>
                <div class="col-xl-8 col-md-8">
                    <div class="form-group">
                        <label for="tenphong">Tên máy:</label>
                        <input type="text" readonly class="form-control" id="tenphong" name="tenphong" value="<?= $phong['tenphong'] ?>">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-8 col-md-4">
                    <div class="form-group">
                        <label for="khachhang">Khách hàng:</label>
                        <select class="form-control" name="khachhang" id="khachhang" placeholder="Chọn khách hàng..">
                            <option>- Chọn khách hàng -</option>
                            <?php
                            if ($querykhachhang && $querykhachhang->num_rows > 0) {
                                while ($khachhang = mysqli_fetch_assoc($querykhachhang)) {
                                    echo '<option value="' . $khachhang['sdt'] . '" data-loaikh="' . $khachhang['loaikhachhang'] . '">' . $khachhang['hoten'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="form-group">
                        <label for="loaikh">Loại khách hàng:</label>
                        <select class="form-control" name="loaikh" id="loaikh">
                            <option>- Chọn loại KH -</option>
                            <option value="Bình thường" data-giamgia="0.0">Bình thường</option>
                            <option value="Thân thuộc" data-giamgia="5.0">Thân thuộc</option>
                            <option value="VIP" data-giamgia="10.0">VIP</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-md-12">
                    <div class="form-group">
                        <label for="thoigianbatdau">Thời gian bắt đầu:</label>
                        <input type="text" class="form-control" id="thoigianbatdau" name="thoigianbatdau" value="<?= date("Y-m-d H:i:s", time()) ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="giatien">Giá tiền:</label>
                        <select class="form-control" name="giatien" id="giatien" placeholder="Chọn giá tiền..">
                            <?php
                            if ($querygia && $querygia->num_rows > 0) {
                                while ($giatien = mysqli_fetch_assoc($querygia)) {
                                    echo '<option value="' . $giatien['idgiatien'] . '">' . $giatien['gia'] . '.000đ</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-xl-6 col-md-6">
                    <div class="form-group">
                        <label for="giamgia">Giảm giá (%):</label>
                        <input type="text" class="form-control" id="giamgia" name="giamgia" value="0.0">
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-group">
                        <label for="ghichu">Ghi chú:</label>
                        <textarea class="form-control" name="ghichu" id="ghichu" cols="30" rows="8"></textarea>
                    </div>
                </div>
            </div>
            <!-- bắt đầu tính giờ -->
            <button name="submit" type="submit" class="btn btn-primary px-5"><i class="fa fa-clock-o"></i> Bắt đầu tính giờ</button>
            <a href="./index-nv.php" class="btn btn-danger px-5"><i class="fa fa-reply"></i> Trở về</a>
        </form>
    </div>
</div>
<script>
    $('#khachhang').change(function() {
        $('#loaikh').val($('#khachhang option:selected').data('loaikh')).change();
        if ($('#khachhang option:selected').data('loaikh') == "VIP") {
            $('#giamgia').val("10.0");
        } else if ($('#khachhang option:selected').data('loaikh') == "Thân thuộc") {
            $('#giamgia').val("5.0");
        } else {
            $('#giamgia').val("0.0");
        }

    });
</script>
<?php
require_once('./footer.php');
?>
