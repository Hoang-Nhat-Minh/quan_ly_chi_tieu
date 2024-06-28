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
	<div class="row" style="margin-top: 5%;">
		<div class="col s2">
		</div>
		<div class="col s8">
			<form method="post">
				<div style="width: 100%; height: auto;  color: #EE6E73;">
					<h3 style="margin-left: 5px;">Đăng ký tài khoản</h3>
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
							<td><input type="text" name="username" placeholder="username"></td>
							<td><input type="text" name="name" placeholder="Tên"></td>
						</tr>
						<tr>
							<td><input type="text" name="password1" placeholder="Mật khẩu"></td>
							<td><input type="text" name="password2" placeholder="Nhập lại mật khẩu"></td>
						</tr>
						<tr>
							<td><input type="date" name="birthday" placeholder="Ngày sinh"></td>
							<td>
								<label>
									<input name="sex_user" type="radio" value="1" checked />
									<span>Nam</span>
								</label> |

								<label>
									<input name="sex_user" type="radio" value="0" />
									<span>Nữ</span>
								</label>
							</td>
						</tr>
					</tbody>
				</table>
				<br>
				<input type="submit" name="dangky" value="Thêm tài khoản"
					style="border-radius: 5%; background-color:#EE6E73; color:white; margin-top:10px; border:none; padding:10px;">
			</form>
		</div>
	</div>

	<script src="res\materialize\js\materialize.min.js"></script>
</body>

</html>