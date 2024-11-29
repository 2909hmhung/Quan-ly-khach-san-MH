<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Quản lý Phòng";
require_once('./db_connect.php');
require_once('./include/function.php');
require_once('./header.php');
$queryinsert = 0;
if (isset($_POST['submit']) && $_POST['submit'] == 'Thêm Phòng') {
    $queryinsert = mysqli_query($conn, "INSERT INTO `phong` (`id`, `tenphong`, `tinhtrang`) VALUES (NULL, '" . $_POST['tenphong'] . "', '" . $_POST['tinhtrang'] . "')");
}

$querydel = 0;
if (isset($_POST['xoaid'])) {
    $querydel = mysqli_query($conn, "DELETE FROM `phong` WHERE `phong`.`id` = " . $_POST['xoaid']);
}

$queryupdate = 0;
if (isset($_POST['update'])) {
    $queryupdate = mysqli_query($conn, "UPDATE `phong` SET `tenphong` = '" . $_POST['suatenphong'] . "', `tinhtrang` = '" . $_POST['suatinhtrang'] . "' WHERE `phong`.`id` = " . $_POST['suaid']);
}

$queryphong = mysqli_query($conn, "SELECT * FROM `phong` WHERE 1 ORDER BY `tenphong` ASC");

?>
<?php
if ($queryinsert) :
    echo "<script>Swal.fire('Thành công!', 'Thêm Phòng thành công!', 'success')</script>";
elseif ($queryinsert !== 0) :
    echo "<script>Swal.fire('Thất bại!', 'Thêm Phòng thất bại!', 'error')</script>";
endif;

if ($queryupdate) :
    echo "<script>Swal.fire('Thành công!', 'Sửa Phòng thành công!', 'success')</script>";
elseif ($queryupdate !== 0) :
    echo "<script>Swal.fire('Thất bại!', 'Sửa Phòng thất bại!', 'error')</script>";
endif;

if ($querydel) :
    echo "<script>Swal.fire('Thành công!', 'Xóa Phòng thành công!', 'success')</script>";
elseif ($querydel !== 0) :
    echo "<script>Swal.fire('Thất bại!', 'Xóa Phòng thất bại!', 'error')</script>";
endif;
?>


<form action="" method="post" class="row content-container mb-3">
    <div class="col-5">
        <label for="tenphong" class="form-label">Tên Phòng: </label>
        <input required type="text" name="tenphong" id="tenphong" class="form-control">
    </div>
    <div class="col-5">
        <label for="tinhtrang" class="form-label">Tình trạng Phòng: </label>
        <select required class="form-control" name="tinhtrang" id="tinhtrang">
            <option value="Bình thường">Bình thường</option>
            <option value="Hỏng">Hỏng</option>
        </select>
    </div>
    <div class="col-2">
        <input type="submit" value="Thêm Phòng" id="submit" name="submit" class="btn btn-primary mt-4">
    </div>
</form>

<div class="row">
    <?php while ($phong = mysqli_fetch_assoc($queryphong)) {
        if ($phong['tinhtrang'] == "Hỏng") {
    ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/off.svg" width="100px" class="card-img-top" alt="Phòng hỏng">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $phong['tenphong'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenphong="<?= $phong['tenphong'] ?>" data-tinhtrang="<?= $phong['tenphong'] ?>" data-id="<?= $phong['id'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenphong="<?= $phong['tenphong'] ?>" data-id="<?= $phong['id'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="col-xl-2 col-md-6 mb-4">
                <div class="card text-center">
                    <img src="./assets/img/on.svg" width="100px" class="card-img-top" alt=" ng bình thường">
                    <div class="card-body font-weight-bold text-primary text-center">
                        <div><?= $phong['tenphong'] ?></div>
                        <div>
                            <a href="#" class="btn btn-success" title="Sửa" data-toggle="modal" data-target="#exampleModal" data-tenphong="<?= $phong['tenphong'] ?>" data-tinhtrang="<?= $phong['tenphong'] ?>" data-id="<?= $phong['id'] ?>"><i class="fa fa-pencil"></i></a>
                            <a href="#" class="btn btn-danger" title="Xóa" data-toggle="modal" data-target="#exampleModal2" data-tenphong="<?= $phong['tenphong'] ?>" data-id="<?= $phong['id'] ?>"><i class="fa fa-trash"></i></a>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    } ?>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="post" action="">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sửa </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="suatenphong" class="form-label">Tên Phòng: </label>
                        <input type="hidden" name="suaid" id="suaid">
                        <input type="text" name="suatenphong" id="suatenphong" class="form-control" maxlength="20">
                    </div>
                    <div class="form-group">
                        <label for="suatinhtrang" class="form-label">Tình trạng Phòng: </label>
                        <select class="form-control" name="suatinhtrang" id="suatinhtrang">
                            <option value="Bình thường">Bình thường</option>
                            <option value="Hỏng">Hỏng</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                    <button type="submit" name="update" class="btn btn-primary"><i class="fa fa-save"></i> Lưu và đóng</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="msgxoa"></p>
            </div>
            <div class="modal-footer">
                <form action="" method="post">
                    <input type="hidden" name="xoaid" value="" id="xoaid">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Đóng</button>
                    <button class="btn btn-primary"><i class="fa fa-trash"></i> Chấp nhận</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#exampleModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var tenphong = button.data('tenphong')
        var tinhtrang = button.data('tinhtrang')
        var id = button.data('id')
        var modal = $(this)
        modal.find('.modal-title').text('Sửa ' + tenphong)
        modal.find('#suatenphong').val(tenphong)
        modal.find('#suaid').val(id)
    })
    $('#exampleModal2').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var tenphong = button.data('tenphong')
        var modal = $(this)
        var id = button.data('id')
        modal.find('#xoaid').val(id)
        modal.find('.modal-title').text('Xóa ' + tenphong)
        modal.find('#msgxoa').html("Bạn chắc muốn xóa <b>" + tenphong +"</b>? Sau khi xóa bạn sẽ không thể khôi phục lại được.<br/> - Nếu <b>đồng ý</b> xóa, hãy nhấn <b>chấp nhận</b>.<br/> - Nếu <b>không đồng ý</b> xóa, hãy nhấn <b>đóng</b>.")
    })
</script>
<?php
require_once('./footer.php');
?>
