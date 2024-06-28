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
						<h3 style="margin-left: 5px;">Sửa khoản nợ</h3>
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
								<td><input readonly="" type="text" name="id_no" value="<?php echo $row['id_no'] ?>"></td>
								<td><input type="text" name="noidung" value="<?php echo $row['noidung'] ?>"></td>
							</tr>
							<tr>
								<td><input type="date" name="ngay" value="<?php echo $row['ngay'] ?>"></td>
								<td><input type="number" name="sono" value="<?php echo $row['sono'] ?>"></td>
							</tr>
							<tr>
								<td>
									<select name="loai" class="browser-default">
										<option value="1" <?php if ($row['loai'] == 1) {
											echo "selected";
										} ?>>Chủ nợ</option>
										<option value="0" <?php if ($row['loai'] == 0) {
											echo "selected";
										} ?>>Con nợ</option>
									</select>
								</td>
								<td>
									<select name="trano" class="browser-default">
										<option value="1" <?php if ($row['trano'] == 1) {
											echo "selected";
										} ?>>Đã trả</option>
										<option value="0" <?php if ($row['trano'] == 0) {
											echo "selected";
										} ?>>Chưa trả</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
					<br>
					<input type="submit" name="suano" value="Sửa khoản nợ">
				</form>
			<?php } ?>
		</div>
	</div>
	</div>
</body>

</html>