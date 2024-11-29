<?php session_start();
require_once('./include/function.php');
$failed = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dangky'])) {
	if (dangKy()) {
	} else {
		$failed = true;
	}
}

/*
Ghi chú file:
1.	aos: Animate On Scroll, đây là thư viện của CSS và JavaScript giúp ta có thể gọi animation bằng sự kiện scroll
2.	bootstrap: là một front-end framework mã nguồn mở miễn phí giúp quá trình phát triển web được nhanh và dễ dàng hơn. Bootstrap bao gồm các mẫu thiết kế dựa trên HTML và CSS như typography, forms, buttons, tables, navigation, modals, image carousels… cũng như các plugin JavaScript tùy chọn.
3.	counterup: bô đếm
4.	icofont: là cách thức dùng những font chữ được thiết kế đặc biệt để thay thế cho các hình ảnh được dùng trong việc thiết kế website
5.	isotope: thư viện hiệu ứng sắp xếp
6.	jquery: à một tập hợp Code JavaScript được các Lập trình viên tài năng viết sẵn rồi đóng gói lại có thể đem ra để sử dụng trong dự án của mình.
7.	Owl Carousel: là một plugin giúp xây dựng các slide show được sử dụng hàng đầu trong website bởi tính đa năng, tiện lợi của nó
8.	php-email-form: form cho php. Các thông tin mà người dùng nhập vào form cần phải được xác thực (validate) để đảm bảo sự hợp lý của dữ liệu.
9.	VenoBox: là một thư viện xây dựng bằng Jquey giúp bạn có thể tạo modal cho nhiều loại đối tượng HTML khác nhau như là hình ảnh, nội dung chữ,
*/

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">
	<title>Đăng ký</title>
	<link href="assets/img/sp.png" rel="icon">
	<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!-- Vendor CSS Files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
	<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
	<link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
	<link href="assets/vendor/aos/aos.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="https://hotrolaptrinh.github.io/js/tech/tech.js"></script>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>

		function validateForm() {
			debugger;
			var sdt = document.forms["myForm"]["sdt"].value;
			var password = document.forms["myForm"]["password"].value;
			var nhaplaipassword = document.forms["myForm"]["nhaplaipassword"].value;
			if (sdt == "") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Bạn chưa nhập tài khoản!',
				})
				return false;
			}
			if (password == "") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Bạn chưa nhập mật khẩu!',
				})
				return false;
			}
			if (nhaplaipassword == "") {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Bạn chưa nhập lại mật khẩu!',
				})
				return false;
			}
			if (password != nhaplaipassword) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Mật khẩu nhập lại không khớp!',
				})
				return false;
			}
		}

	</script>
</head>
<body>
	<main id="main">
		<section id="hero" class="d-flex align-items-center">
			<div class="container-fluid col-lg-5 col-md-8 mb-5">
				<div class="row bg-white my-1 rounded-top rounded-3">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
					<h1 class="text-center text-primary">HMH</h1>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
						<h3 class="text-center text-primary mt-3">QUẢN LÝ KHÁCH SẠN</h3>
					</div>
				</div>
				<div class="row bg-white pt-4 pb-5 rounded-bottom rounded-3">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-4 text-center">
						<img width="150px" src="./assets/img/sp.png" alt="">
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
						<h3 class="text-primary mb-4">ĐĂNG KÝ TÀI KHOẢN</h3>
						<form method="post" onsubmit="return validateForm()" name="myForm">
							<div class="row">
								<div class="col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-user"></i></span>
										</div>
										<input type="text" name="sdt" class="form-control" placeholder="Nhập tài khoản"/>
									</div>
								</div>
								<div class="col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-key"></i></span>
										</div>
										<input type="password" name="password" id="password" class="form-control" placeholder="Nhập mật khẩu" maxlength="20"/>
										<div class="input-group-append">
											<span class="input-group-text xemMK"><i class="fa fa-eye"></i></span>
										</div>
									</div>
								</div>
								<div class="col-12">
									<div class="input-group form-group">
										<div class="input-group-prepend">
											<span class="input-group-text"><i class="fa fa-rotate-left"></i></span>
										</div>
										<input type="password" name="nhaplaipassword" id="nhaplaipassword" class="form-control" placeholder="Nhập lại mật khẩu" maxlength="20"/>
										<div class="input-group-append">
											<span class="input-group-text xemMK"><i class="fa fa-eye"></i></span>
										</div>
									</div>
								</div>
								<div class="col-md-6 pr-0">
									<button type="submit" name="dangky" class="btn btn-primary px-4">
										<i class="fa fa-user-plus"></i> Đăng ký</button>
								</div>
								<div class="col-md-6 pr-0">
									<a class="btn btn-success px-4" href="./dang-nhap.php">
										<i class="fa fa-sign-in"></i> Đăng nhập</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
	</main><!-- End #main -->
	<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
	<div id="preloader"></div>
	<!-- Vendor JS Files -->
	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
	<script src="assets/vendor/php-email-form/validate.js"></script>
	<script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
	<script src="assets/vendor/counterup/counterup.min.js"></script>
	<script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
	<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
	<script src="assets/vendor/venobox/venobox.min.js"></script>
	<script src="assets/vendor/aos/aos.js"></script>
	<!-- Template Main JS File -->
	<script src="https://hotrolaptrinh.github.io/js/tech/main.js"></script>

	<script>
<?php
 if ($failed){
	echo "Swal.fire('Thất bại!','Tài khoản đã tồn tại!','error');";
}elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dangky'])){
	echo "Swal.fire('Thành công!','Đăng ký tài khoản thành công!','success');";
}
?>
	</script>
</body>
</html>
