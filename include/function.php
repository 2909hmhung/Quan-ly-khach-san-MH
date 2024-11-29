<?php
function dangNhap()
{
	if (isset($_POST['sdt']) && isset($_POST['password'])) {
		require_once('././db_connect.php');
		$sdt = $conn->real_escape_string($_POST['sdt']);
		$password = $conn->real_escape_string($_POST['password']);
		$query = $conn->query("SELECT * FROM `taikhoan` WHERE `taikhoan` = '$sdt'");
		if ($query->num_rows > 0) {
			$row = $query->fetch_assoc();
			if ($row['matkhau'] == md5($password)) {
				$_SESSION['taikhoan'] = $row['taikhoan'];
				$_SESSION['hoten'] = $row['hoten'];
				$_SESSION['loaitaikhoan'] = $row['loaitaikhoan'];
				return true;
			}
		}
	}
	return false;
}

function dangKy()
{
	if (isset($_POST['sdt']) && isset($_POST['password'])) {
		require_once('././db_connect.php');
		$sdt = $conn->real_escape_string($_POST['sdt']);
		$password = md5($_POST['password']);
		$query = $conn->query("SELECT * FROM `taikhoan` WHERE `taikhoan` = '$sdt'");
		if ($query && $query->num_rows > 0) {
			return false;
		} else {
			$query = $conn->query("INSERT INTO `taikhoan` (`taikhoan`, `matkhau`,`loaitaikhoan`) VALUES ('$sdt', '$password','Bình thường')");
			if ($query) {
				return true;
			}
		}
	}
	return false;
}

function checkOldPass()
{
	$matkhaucu = md5($_POST['matkhaucu']);
	if ($matkhaucu == $_SESSION['matkhau']) {
		return true;
	}
	return false;
}
function checkSamePass()
{
	$matkhaumoi = md5($_POST['matkhaumoi']);
	if ($matkhaumoi != $_SESSION['matkhau']) {
		return true;
	}
	return false;
}
function checkValidPass()
{
	$matkhaumoi = md5($_POST['matkhaumoi']);
	$matkhauxacnhan = md5($_POST['matkhauxacnhan']);
	if ($matkhaumoi == $matkhauxacnhan) {
		return true;
	}
	return false;
}
