<?php ob_start(); ?>
<div class="row">
	<div class="col s4">
	</div>
	<div class="col s4">
		<?php while ($row = $kq->fetch_assoc()) { ?>
			<form method="post">
				<div style="width: 100%; height: auto;  color: #EE6E73;">
					<h3 style="margin-left: 5px;">Sửa thông tin chi tiêu</h3>
				</div>
				<h6>
					<?php if (isset($_SESSION['error'])) {
						echo $_SESSION['error'];
						unset($_SESSION['error']);
					} ?>
				</h6>
				<table>
					<tbody>
						<tr>
							<input type="text" name="noidung" value="<?php echo $row['noidung'] ?>">
						</tr>
						<tr>
							<input type="date" name="ngay" value="<?php echo $row['ngay'] ?>">
						</tr>
						<tr>
							<input type="number" name="chi" value="<?php echo $row['chi'] ?>">
						</tr>
						<tr>
							<label style="font-size: larger">Loại chi tiêu:</label>
							<label>
								<p>
									<label>
										<input name="loai" type="radio" value="Ăn uống" checked
											onclick="document.getElementById('otherType').disabled = true;">
										<span>Ăn uống</span>
									</label>
								</p>
								<label>
									<p>
										<input name="loai" type="radio" value="Hóa đơn"
											onclick="document.getElementById('otherType').disabled = true;">
										<span>Hóa đơn</span>
									</p>
								</label>
								<label>
									<p>
										<input name="loai" type="radio" value="Điện nước"
											onclick="document.getElementById('otherType').disabled = true;">
										<span>Điện nước</span>
									</p>
								</label>
								<label>
									<p>
										<input name="loai" type="radio" value="Y tế"
											onclick="document.getElementById('otherType').disabled = true;">
										<span>Y tế</span>
									</p>
								</label>
								<label>
									<p>
										<input name="loai" type="radio" value="Học phí"
											onclick="document.getElementById('otherType').disabled = true;">
										<span>Học phí</span>
									</p>
								</label>
								<label>
									<p>
										<input name="loai" type="radio" value="Khác"
											onclick="document.getElementById('otherType').disabled = false;">
										<span>Khác</span>
									</p>
								</label>
								<input name="otherType" id="otherType" type="text" placeholder="Nhập loại khác..." disabled>
								</p>
							</label>
						</tr>
					</tbody>
				</table>
				<input type="submit" name="suachi" value="Sửa chi tiêu"
					style="border-radius: 5%; background-color:#EE6E73; color:white; margin-top:10px; border:none; padding:10px;cursor:pointer">
			</form>
		<?php } ?>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>