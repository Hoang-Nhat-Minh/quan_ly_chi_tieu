<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Trang cá nhân</title>
	<link rel="stylesheet" type="text/css" href="res/materialize/css/materialize.css">
	<link rel="stylesheet" type="text/css" href="res/style.css">
</head>

<body>
	<div class="row" style="margin-top:20vh;margin-bottom:20vh;">
		<div class="col s2">
		</div>
		<div class="col s8">
			<form method="post">
				<div style="width: 100%; height: auto;  color: #EE6E73;">
					<h3 style="margin-left: 5px;">Trang cá nhân</h3>
				</div>
				<h6>
					<?php if (isset ($_SESSION['error'])) {
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					} ?>
				</h6>
				<?php while ($row = $kq->fetch_assoc()) { ?>
					<table>
						<tbody>
							<tr>
								<input type="text" name="username" value="<?php echo $row['username'] ?>">
								<input type="text" name="name" value="<?php echo $row['name'] ?>">
							</tr>
							<tr>
								<input type="date" name="birthday" value="<?php echo $row['birthday'] ?>">

								<label>
									<input name="sex_user" type="radio" value="1" <?php if ($row['sex_user'] == 1) {
										echo "checked";
									} ?> />
									<span>Nam</span>
								</label>
								|
								<label>
									<input name="sex_user" type="radio" value="0" <?php if ($row['sex_user'] == 0) {
										echo "checked";
									} ?> />
									<span>Nữ</span>
								</label>
							</tr>
						</tbody>
					</table>
				<?php } ?>
				<br>
				<input class="waves-effect waves-light btn" type="submit" name="suattcn" style="color:white !important"
					value="Sửa thông tin cá nhân" />
				<a class="waves-effect waves-light btn" href="index.php?action=suamatkhau">Sửa mật khẩu</a>
				<a style="background-color: red;" class="waves-effect waves-light btn" href="index.php?action=xoataikhoan">Xoá
					tài khoản</a>
			</form>
		</div>
	</div>

	<script src="res\materialize\js\materialize.min.js"></script>
</body>

</html>