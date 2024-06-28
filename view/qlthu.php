<?php ob_start(); ?>
<div class="row">
	<div class="col s3">
		<?php include 'view/layout/collection.php'; ?>
	</div>
	<div class="col s9">
		<div style="margin-left: 86%;">
			<button class="waves-effect waves-light btn" id="qlchitieu" style="margin-top:10px;">Loại chi
				thu</button>
			<div class="collection" id="qlchitieu-dropdown" style="display: none; position:absolute">
				<div class=" collection-item">Ăn uống</div>
				<div class="collection-item">Tất cả</div>
				<div class="collection-item">Hóa đơn</div>
				<div class="collection-item">Điện nước</div>
				<div class="collection-item">Y tế</div>
				<div class="collection-item">Học phí</div>
			</div>
		</div>
		<div class="content" style="border: 1px solid #E0E0E0;border-radius:2%; padding:10px; margin-top:10px">
			<div style="height: 450px;">
				<table>
					<thead>
						<tr>
							<th style="width: 60%;">Nội dung</th>
							<th style="width: 15%;">Ngày</th>
							<th style="width: 15%;">Thu</th>
							<th style="width: 8%;">Thao tác</th>
						</tr>
					</thead>
					<?php while ($row = $kq->fetch_assoc()) { ?>
						<tbody>
							<tr>
								<td>
									<?php echo $row['noidung'] ?>
								</td>
								<td>
									<?php echo $row['ngay'] ?>
								</td>
								<td>
									<?php echo $row['thu'] ?>
								</td>
								<td><a href="index.php?action=suathu&id_thu=<?php echo $row['id_thu'] ?>">Sửa</a> | <a
										href="index.php?action=xoathu&id_thu=<?php echo $row['id_thu'] ?>">Xoá</a></td>
							</tr>

						</tbody>
					<?php } ?>
				</table>
			</div>

			<div>
				<form method="post">
					<div style="width: 100%; height: auto; background-color: #EE6E73; color: #EAF5E0;">
						<h3 style="font-family: baltica;font-weight: bold;padding: 5px;text-align:center">Thêm mới khoản thu</h3>
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
								<input type="text" name="noidung" placeholder="Code ra tiền!..">
							</tr>
						</tbody>
					</table>

					<table>
						<tbody>
							<tr>
								<td><input type="date" name="ngay" value=""></td>
								<td><input type="number" name="thu" placeholder="Số tiền"></td>
							</tr>
						</tbody>
					</table>
					<input type="submit" name="themthu" value="Thêm khoản thu"
						style="border-radius: 5%; background-color:#EE6E73; color:white; margin-top:10px; border:none; padding:10px;cursor: pointer;">
				</form>
			</div>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>