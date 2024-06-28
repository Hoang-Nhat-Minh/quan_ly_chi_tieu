<!DOCTYPE html>
<html>

<head>
	<title>Quản lý chi tiêu</title>
	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
</head>

<body>
	<?php include 'view/header.php'; ?>
	<div class="row">

		<div class="col s4">

		</div>
		<div class="col s4">
			<form method="post">
				<div style="width: 100%; height: auto;  color: #EE6E73;">
					<h3 style="margin-left: 5px;">Sửa mật khẩu</h3>
				</div>
				<h6>
					<?php if (isset ($_SESSION['error'])) {
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					} ?>
				</h6>
				<table>
					<tbody>
						<tr>
							<td><input type="text" name="matkhau" placeholder="Mật khẩu cũ"></td>
						</tr>
						<tr>
							<td><input type="text" name="matkhau1" placeholder="Mật khẩu mới"></td>
						</tr>
						<tr>
							<td><input type="text" name="matkhau2" placeholder="Nhập lại mật khẩu mới"></td>
						</tr>
					</tbody>
				</table>
				<br>
				<input class="waves-effect waves-light btn" type="submit" name="suamk" value="Đổi mật khẩu">
			</form>
		</div>
	</div>


	</div>
</body>

</html>