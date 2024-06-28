<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>
	<form action="" method="post">
		<div class="row" style="margin-top: 5%;">
			<div class="col s12 m4 offset-m4">
				<div class="card">
					<div class="card-action teal light-1 white-text">
						<h3>Đăng nhập</h3>
						<h6>
							<?php if (isset ($_SESSION['error'])) {
								echo $_SESSION['error'];
								unset($_SESSION['error']);
							} ?>
						</h6>
					</div>
					<div class="card-content">
						<div class="form-field">
							<label for="username">Username:</label>
							<input type="text" value="" name="username">
						</div>
						<div class="form-field">
							<label for="password">Password:</label>
							<input type="password" value="" name="password">
						</div>
						<div class="form-field">
							<button class="btn-large waves-effect waves-drak" style="width: 100%" type="submit" name="dangnhap">Đăng
								nhập</button>
						</div>
						<div class="form-field">
							<br>
							<p style="text-align: center;">Bạn chưa có tài khoản? <a href="index.php?action=dangky">Đăng ký</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>