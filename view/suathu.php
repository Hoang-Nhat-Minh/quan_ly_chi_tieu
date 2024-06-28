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

			<?php while ($row = $kq->fetch_assoc()) { ?>

				<form method="post">
					<div style="width: 100%; height: auto;  color: #EE6E73;">
						<h3 style="margin-left: 5px;">Sửa khoản thu</h3>
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
								<td><input readonly="" type="text" name="id_thu" value="<?php echo $row['id_thu'] ?>"></td>
								<td><input type="text" name="noidung" value="<?php echo $row['noidung'] ?>"></td>
							</tr>
						</tbody>
					</table>

					<table>
						<tbody>
							<tr>
								<td><input type="date" name="ngay" value="<?php echo $row['ngay'] ?>"></td>
								<td><input type="number" name="thu" value="<?php echo $row['thu'] ?>"></td>
							</tr>
						</tbody>
					</table>
					<input type="submit" name="suathu" value="Sửa khoản thu">
				</form>
			<?php } ?>
		</div>
	</div>
	</div>
</body>

</html>