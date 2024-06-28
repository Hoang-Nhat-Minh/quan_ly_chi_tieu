<?php

include ('model/model.php');
class controller
{
	public $model;
	public function __construct()
	{
		$this->model = new database();
	}

	public function dangnhap()
	{
		if (isset($_POST['dangnhap'])) {
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			//var_dump($password); die();
			if ($this->model->dangnhap($username, $password)) {
				$_SESSION['username'] = $username;

				header('location: index.php');
			} elseif ($username == "" || $password == "") {
				$_SESSION['error'] = "Tài khoản mật khẩu không được để trống";
				header('location:index.php');
			} else {
				$_SESSION['error'] = "Tên đăng nhập hoặc mật khẩu không đúng!";
				header('location:index.php');
			}
		} else {
			include 'view/dangnhap.php';
		}
	}

	public function dangky()
	{
		if (isset($_POST['dangky'])) {
			$username = $_POST['username'];
			$name = $_POST['name'];
			$password1 = md5($_POST['password1']);
			$password2 = md5($_POST['password2']);
			$birthday = $_POST['birthday'];
			$sex_user = $_POST['sex_user'];
			//var_dump($username); die();
			if ($username == '' || $name == '' || $password1 == '' || $password2 == '' || $birthday == '' || $sex_user == '') {
				$_SESSION['error'] = "Bạn không được để trống";
				header('location:index.php?action=dangky');
			} elseif ($password2 != $password1) {
				$_SESSION['error'] = "Mật khẩu không trùng nhau!";
				header('location:index.php?action=dangky');
			} elseif ($this->model->getuser($username)) {
				$_SESSION['error'] = "Username đã tồn tại!";
				header('location:index.php?action=dangky');
			} else {
				$this->model->dangky($username, $name, $password1, $birthday, $sex_user);
				header('location:index.php');
			}
		} else {
			include 'view/dangky.php';
		}
	}


	public function trangcanhan()
	{
		if (isset($_POST['suattcn'])) {
			$username = $_POST['username'];
			$name = $_POST['name'];
			$birthday = $_POST['birthday'];
			$sex_user = $_POST['sex_user'];
			//var_dump($username); die();
			if ($username == '' || $name == '' || $birthday == '' || $sex_user == '') {
				$_SESSION['error'] = "Bạn không được để trống";
				header('location:index.php?action=trangcanhan');
			} elseif ($username != $_SESSION['username']) {
				if ($this->model->getuser($username)) {
					$_SESSION['error'] = "Username đã tồn tại!";
					header('location:index.php?action=trangcanhan');
				} else {
					$this->model->suattcn($username, $name, $birthday, $sex_user);
					$_SESSION['username'] = $username; // Cập nhật $_SESSION['username']
					header('location:index.php?action=trangchu');
				}
			} else {
				$this->model->suattcn($username, $name, $birthday, $sex_user);
				$_SESSION['username'] = $username; // Cập nhật $_SESSION['username']
				header('location:index.php?action=trangchu');
			}
		} else {
			$username = $_SESSION['username'];
			$kq = $this->model->getttcn($username);
			include 'view/trangcanhan.php';
		}
	}


	public function suamatkhau()
	{
		if (isset($_POST['suamk'])) {
			$username = $_SESSION['username'];
			$password = md5($_POST['matkhau']);
			$password1 = md5($_POST['matkhau1']);
			$password2 = md5($_POST['matkhau2']);
			//var_dump($password2); die();
			if ($password != '' || $password1 != '' || $password2 != '') {
				if ($this->model->dangnhap($username, $password)) {
					if ($password1 != $password2) {
						$_SESSION['error'] = "Mật khẩu mới không trùng nhau!";
						header('location:index.php?action=suamatkhau');
					} else {
						$this->model->suamatkhau($password1);
						header('location:index.php?action=trangcanhan');
					}
				} else {
					$_SESSION['error'] = "Mật khẩu không đúng";
					header('location:index.php?action=suamatkhau');
				}
			} else {
				$_SESSION['error'] = "Bạn không được để trống";
				header('location:index.php?action=suamatkhau');
			}
		} else {
			include 'view/suamatkhau.php';
		}
	}

	public function xoataikhoan()
	{
		$this->model->xoataikhoan();
		$this->dangxuat();
	}

	public function trangchu()
	{
		if (isset($_POST['themchi'])) {
			$id_user = $_SESSION['id_user'];
			$noidung = $_POST['noidung'];
			$ngay = $_POST['ngay'];
			$loai = $_POST['loai'];
			if ($loai == 'Khác') {
				$loai = $_POST['otherType'];
			}
			$chi = $_POST['chi'];
			if ($noidung == '' || $ngay == '' || $chi == '') {
				$_SESSION['error'] = "Bạn không được để trống!";
				header('location:index.php');
			} else {
				$this->model->themchi($id_user, $noidung, $ngay, $loai, $chi);
			}
			header('location: index.php');
		} elseif (isset($_POST['locbangtrangchu'])) {
			$loai = $_POST['locbangradio'];
			$id_user = $this->model->getid()['id_user'];
			$_SESSION['id_user'] = $id_user;
			// Lấy dữ liệu từ cơ sở dữ liệu dựa trên loại chi tiêu
			$kq = $this->model->getLocBangTheoLoai($id_user, $loai);

			// Hiển thị dữ liệu đã được lọc
			include 'view/trangchu.php';
		} else {
			$id_user = $this->model->getid()['id_user'];
			$_SESSION['id_user'] = $id_user;
			//var_dump($id_user); die();
			$kq = $this->model->getchi($id_user);

			include 'view/trangchu.php';
		}
	}

	public function suachi()
	{
		if (isset($_POST['suachi'])) {
			$id_chi = $_POST['id_chi'];
			$noidung = $_POST['noidung'];
			$ngay = $_POST['ngay'];
			$loai = $_POST['loai'];
			if ($loai == 'Khác') {
				$loai = $_POST['otherType'];
			}
			$chi = $_POST['chi'];
			var_dump($id_chi, $noidung, $ngay, $loai);
			if ($noidung == '' || $ngay == '' || $chi == '') {
				$_SESSION['error'] = "Bạn không được để trống!";
				$id_chi = $_GET['id_chi'];
				$kq = $this->model->suachi($id_chi);
				include "view/suachi.php";
			} else {
				$this->model->luuchi($id_chi, $noidung, $ngay, $loai, $chi);
				header('location:index.php');
			}
		} else {
			$id_chi = $_GET['id_chi'];
			$kq = $this->model->suachi($id_chi);
			include "view/suachi.php";
		}
	}

	public function xoachi()
	{
		$id_chi = $_GET['id_chi'];
		$this->model->xoachi($id_chi);
		header('location: index.php');
	}

	public function qlthu()
	{
		if (isset($_POST['themthu'])) {
			$id_user = $_SESSION['id_user'];
			$noidung = $_POST['noidung'];
			$ngay = $_POST['ngay'];
			$thu = $_POST['thu'];
			if ($noidung == '' || $ngay == '' || $thu == '') {
				$_SESSION['error'] = "Bạn không được để trống!";
				header('location:index.php?action=qlthu');
			} else {
				$this->model->themthu($id_user, $noidung, $ngay, $thu);
			}

			header('location: index.php?action=qlthu');

		} else {
			$id_user = $_SESSION['id_user'];
			$kq = $this->model->getthu($id_user);

			include 'view/qlthu.php';
		}
	}

	public function suathu()
	{
		if (isset($_POST['suathu'])) {
			$id_thu = $_POST['id_thu'];
			$noidung = $_POST['noidung'];
			$ngay = $_POST['ngay'];
			$thu = $_POST['thu'];

			if ($noidung == '' || $ngay == '' || $thu == '') {
				$_SESSION['error'] = "Bạn không được để trống!";
				$id_thu = $_GET['id_thu'];
				$kq = $this->model->suathu($id_thu);
				include "view/suathu.php";
			} else {
				//var_dump($thu); die();
				$this->model->luuthu($id_thu, $noidung, $ngay, $thu);
				header('location:index.php?action=qlthu');
			}
		} else {
			$id_thu = $_GET['id_thu'];
			$kq = $this->model->suathu($id_thu);
			include "view/suathu.php";
		}

	}

	public function xoathu()
	{
		$id_thu = $_GET['id_thu'];
		$this->model->xoathu($id_thu);
		header('location: index.php?action=qlthu');
	}

	public function qlsono()
	{
		if (isset($_POST['themno'])) {
			$id_user = $_SESSION['id_user'];
			$loai = $_POST['loai'];
			$noidung = $_POST['noidung'];
			$ngay = $_POST['ngay'];
			$sono = $_POST['sono'];
			if ($loai == '' || $noidung == '' || $ngay == '' || $sono == '') {
				$_SESSION['error'] = "Bạn không được để trống!";
				header('location:index.php?action=qlsono');
			} else {
				$this->model->themno($id_user, $loai, $noidung, $ngay, $sono);
			}

			header('location: index.php?action=qlsono');

		} else {
			$id_user = $_SESSION['id_user'];
			$kq = $this->model->getsono($id_user);

			include 'view/qlsono.php';
		}
	}

	public function suano()
	{
		if (isset($_POST['suano'])) {
			$id_no = $_POST['id_no'];
			$trano = $_POST['trano'];
			$loai = $_POST['loai'];
			$noidung = $_POST['noidung'];
			$ngay = $_POST['ngay'];
			$sono = $_POST['sono'];

			if ($trano == '' || $loai == '' || $noidung == '' || $ngay == '' || $sono == '') {
				$_SESSION['error'] = "Bạn không được để trống!";
				$id_no = $_GET['id_no'];
				$kq = $this->model->suano($id_no);
				include "view/suano.php";
			} else {
				//var_dump($thu); die();
				$this->model->luuno($id_no, $trano, $loai, $noidung, $ngay, $sono);
				header('location:index.php?action=qlsono');
			}
		} else {
			$id_no = $_GET['id_no'];
			// $_SESSION['id_no']=$id_no;
			$kq = $this->model->suano($id_no);
			include "view/suano.php";
		}

	}

	public function xoano()
	{
		$id_no = $_GET['id_no'];
		$this->model->xoano($id_no);
		header('location: index.php?action=qlsono');
	}

	public function trano()
	{
		$id_no = $_GET['id_no'];
		$this->model->trano($id_no);
		header('location: index.php?action=qlsono');
	}

	public function dangxuat()
	{
		session_destroy();
		header('location:index.php');
	}
}
?>