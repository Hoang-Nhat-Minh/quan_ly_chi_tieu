<?php

class database
{
	public $conn;
	public function __construct()
	{
		$this->conn = new mysqli("localhost", "root", "", "qlchitieu") or die("Loi ket noi");
		$this->conn->set_charset("UTF8");
	}

	public function dangnhap($username, $password)
	{
		$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		//var_dump($sql); die();
		$kq = $this->conn->query($sql);
		while ($row = $kq->fetch_array()) {
			$_SESSION['name'] = $row['name'];
			//var_dump($_SESSION['name']); die();
		}


		if ($kq->num_rows > 0) {

			return true;
		} else {
			return false;
		}
	}

	public function getuser($username)
	{
		$sql = "SELECT * FROM user WHERE username='$username'";
		//var_dump($sql); die();
		$kq = $this->conn->query($sql);

		if ($kq->num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function dangky($username, $name, $password1, $birthday, $sex_user)
	{
		$sql = "INSERT INTO `user`( `username`, `password`, `name`, `birthday`, `sex_user`) VALUES ('$username','$password1','$name','$birthday','$sex_user')";
		//var_dump($sql); die();
		$this->conn->query($sql);
	}

	public function getttcn($username)
	{
		$sql = "SELECT * FROM user WHERE username='$username'";
		//var_dump($sql); die();
		$kq = $this->conn->query($sql);

		return $kq;
	}

	public function suattcn($username, $name, $birthday, $sex_user)
	{
		$id_user = $_SESSION['id_user'];
		$sql = "UPDATE `user` SET `username`='$username',`name`='$name',`birthday`='$birthday',`sex_user`='$sex_user' WHERE id_user='$id_user'";
		//var_dump($sql); die();
		$this->conn->query($sql);
	}

	public function suamatkhau($password1)
	{
		$id_user = $_SESSION['id_user'];
		$sql = "UPDATE `user` SET `password`='$password1' WHERE id_user='$id_user'";
		//var_dump($sql); die();
		$this->conn->query($sql);
	}

	public function xoataikhoan()
	{
		$id_user = $_SESSION['id_user'];
		$sql = "DELETE FROM `thu` WHERE id_user='$id_user'";
		$this->conn->query($sql);
		$sql = "DELETE FROM `chi` WHERE id_user='$id_user'";
		$this->conn->query($sql);
		$sql = "DELETE FROM `so_no` WHERE id_user='$id_user'";
		$this->conn->query($sql);
		$sql = "DELETE FROM `user` WHERE id_user='$id_user'";
		$this->conn->query($sql);
	}


	public function getid()
	{
		$username = $_SESSION['username'];
		$sql = "SELECT id_user FROM user WHERE username='$username'";
		$kq = $this->conn->query($sql);
		return $kq->fetch_assoc();
	}

	public function getchi($id_user)
	{
		$sql = "SELECT * FROM chi WHERE id_user='$id_user'";
		$kq = $this->conn->query($sql);
		//var_dump($sql); die();
		return $kq;
	}

	public function themchi($id_user, $noidung, $ngay, $loai, $chi)
	{
		$sql = "INSERT INTO `chi`(`id_user`, `noidung`, `ngay`,`loai`, `chi`) VALUES ('$id_user','$noidung','$ngay','$loai','$chi')";
		$this->conn->query($sql);
	}

	public function suachi($id_chi)
	{
		$sql = "SELECT * FROM `chi` WHERE id_chi='$id_chi'";
		$kq = $this->conn->query($sql);
		return $kq;
	}

	public function luuchi($id_chi, $noidung, $ngay, $loai, $chi)
	{
		$sql = "UPDATE `chi` SET `noidung`='$noidung',`ngay`='$ngay',`loai`='$loai',`chi`='$chi' WHERE id_chi='$id_chi'";
		$this->conn->query($sql);
	}

	public function xoachi($id_chi)
	{
		$sql = "DELETE FROM `chi` WHERE id_chi='$id_chi'";
		$this->conn->query($sql);
	}

	public function getthu($id_user)
	{
		$sql = "SELECT * FROM thu WHERE id_user='$id_user'";
		$kq = $this->conn->query($sql);
		//var_dump($sql); die();
		return $kq;
	}

	public function themthu($id_user, $noidung, $ngay, $thu)
	{
		$sql = "INSERT INTO `thu`(`id_user`, `noidung`, `ngay`, `thu`) VALUES ('$id_user','$noidung','$ngay','$thu')";
		$this->conn->query($sql);
	}

	public function suathu($id_thu)
	{
		$sql = "SELECT * FROM `thu` WHERE id_thu='$id_thu'";
		$kq = $this->conn->query($sql);
		return $kq;
	}

	public function luuthu($id_thu, $noidung, $ngay, $thu)
	{
		$sql = "UPDATE `thu` SET `noidung`='$noidung',`ngay`='$ngay',`thu`='$thu' WHERE id_thu='$id_thu'";
		// var_dump($sql); die();
		$this->conn->query($sql);
	}

	public function xoathu($id_thu)
	{
		$sql = "DELETE FROM `thu` WHERE id_thu='$id_thu'";
		$this->conn->query($sql);
	}

	public function getsono($id_user)
	{
		$sql = "SELECT * FROM so_no WHERE id_user='$id_user'";
		$kq = $this->conn->query($sql);
		//var_dump($sql); die();
		return $kq;
	}

	public function themno($id_user, $loai, $noidung, $ngay, $sono)
	{
		$sql = "INSERT INTO `so_no`( `loai`, `noidung`, `ngay`, `sono`, `id_user`, `trano`) VALUES ('$loai','$noidung','$ngay','$sono','$id_user',0)";
		$this->conn->query($sql);
	}

	public function suano($id_no)
	{
		$sql = "SELECT * FROM `so_no` WHERE id_no='$id_no'";
		$kq = $this->conn->query($sql);
		return $kq;
	}

	public function luuno($id_no, $trano, $loai, $noidung, $ngay, $sono)
	{
		$sql = "UPDATE `so_no` SET `loai`='$loai',`noidung`='$noidung',`ngay`='$ngay',`sono`='$sono',`trano`='$trano' WHERE id_no='$id_no'";
		// var_dump($sql); die();
		$this->conn->query($sql);
	}

	public function xoano($id_no)
	{
		$sql = "DELETE FROM `so_no` WHERE id_no='$id_no'";
		$this->conn->query($sql);
	}

	public function trano($id_no)
	{
		$sql = "UPDATE `so_no` SET `trano`=1 WHERE id_no='$id_no'";
		$this->conn->query($sql);
	}

	public function getLocBangTheoLoai($id_user, $loai)
	{
		$exclude = ["Ăn uống", "Hóa đơn", "Điện nước", "Y tế", "Học phí"];
		$sql = "SELECT * FROM `chi` WHERE id_user = ?";

		if ($loai == "Khác") {
			$sql .= " AND loai NOT IN ('" . implode("','", $exclude) . "')";
		} elseif (in_array($loai, $exclude)) {
			$sql .= " AND loai = ?";
		}

		$stmt = $this->conn->prepare($sql);

		if (in_array($loai, $exclude)) {
			$stmt->bind_param("ss", $id_user, $loai);
		} else {
			$stmt->bind_param("s", $id_user);
		}

		$stmt->execute();
		$result = $stmt->get_result();
		return $result;
	}
}
?>