
<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
$title = "Admin quán net";
require_once('./header.php');
require_once('./db_connect.php');

?>

<div class="row content-container">
	<?php
	$query = mysqli_query($conn, "SELECT * FROM `phong` WHERE 1 ORDER BY `tenphong` ASC");
	if ($query && $query->num_rows > 0) :
		while ($phong = mysqli_fetch_assoc($query)) :
			if ($phong['tinhtrang'] == 'Hỏng') :
	?>
				<div class="col-xl-2 col-md-4 col-6 mb-4"data-aos="zoom-in">
					<div class="card">
						<img src="./assets/img/off.svg" width="100px" class="card-img-top" alt="Phòng đang gặp sự cố">
						<div class="card-body">
							<p class="font-weight-bold text-primary text-center"><?= $phong['tenphong'] ?></p>
							<p class="text-danger text-center">Phòng hỏng</p>
						</div>
					</div>
				</div>
				<?php
			else :
				$querygiaodich = mysqli_query($conn, "SELECT * FROM `giaodich`, `giatien` WHERE `idphong`='" . $phong['id'] . "' AND `giatien`.`idgiatien`=`giaodich`.`idgiatien` ORDER BY `thoigianbatdau` DESC LIMIT 1");
				if ($querygiaodich && $querygiaodich->num_rows > 0) :
					$giaodich = mysqli_fetch_assoc($querygiaodich);
					if ($giaodich['thoigianketthuc'] == NULL) :
				?>
						<div class="col-xl-2 col-md-4 col-6 mb-4" data-aos="zoom-in">
							<a class="card" href="./ql-giao-dich.php?phong=<?= $phong['id'] ?>">
								<img src="./assets/img/checkin.svg" width="100px" class="card-img-top" alt="Phòng đang sử dụng">
								<div class="card-body">
									<div class="font-weight-bold text-primary text-center"><?= $phong['tenphong'] ?></div>
									<div class="text-info text-center"><?= date("H:i:m", strtotime($giaodich['thoigianbatdau'])); ?></div>
									<div class="text-second text-center"><?php echo ceil(((time() - strtotime($giaodich['thoigianbatdau'])) / 3600) * $giaodich['gia'] * ((100 - $giaodich['giamgia']) / 100)); ?>.000 đ</div>
								</div>
							</a>
						</div>
					<?php
					else :
					?>
						<div class="col-xl-2 col-md-4 col-6 mb-4" data-aos="zoom-in">
							<a class="card text-center" href="./them-giao-dich.php?phong=<?= $phong['id'] ?>">
								<img src="./assets/img/on.svg" width="100px" class="card-img-top" alt="Phòng trống">
								<div class="card-body">
									<p class="font-weight-bold text-primary text-center"><?= $phong['tenphong'] ?></p>
									<small class="text-second text-center">Phòng trống</small>
								</div>
							</a>
						</div>
					<?php
					endif;
				else :
					?>
					<div class="col-xl-2 col-md-4 col-6 mb-4" data-aos="zoom-in">
						<a class="card text-center" href="./them-giao-dich.php?phong=<?= $phong['id'] ?>">
							<img src="./assets/img/on.svg" width="100px" class="card-img-top" alt="Phòng trống">
							<div class="card-body">
								<p class="font-weight-bold text-primary text-center"><?= $phong['tenphong'] ?></p>
								<small class="text-second text-center">Phòng trống</small>
							</div>
						</a>
					</div>
	<?php
				endif;
			endif;
		endwhile;
	endif;
	?>
</div>


<?php
require_once('./footer.php');

?>
