<?php ob_start(); ?>
<div class="row">
	<div class="col s3">
		<?php include 'view/layout/collection.php'; ?>
	</div>
	<div class="col s9">
		<div class="content" style="border: 1px solid #E0E0E0;border-radius:2%; padding:10px; margin-top:10px">
			<div style="height: 450px;">
				<table>
					<thead>
						<tr>
							<th style="width: 45%;">Nội dung</th>
							<th style="width: 15%;">Ngày</th>
							<th style="width: 15%;">Thiệt hại</th>
							<th style="width: 15%;">
								<div>
									<form method="post">
										<div style="cursor: pointer; text-decoration: underline;" id="qlchitieu">Loại chi tiêu</div>
										<div class="collection" id="qlchitieu-dropdown"
											style="display: none; position:absolute;background-color: white;">
											<p>
												<label>
													<input name="locbangradio" type="radio" value="Tất cả" checked />
													<span>Tất cả</span>
												</label>
											</p>
											<p>
												<label>
													<input name="locbangradio" type="radio" value="Ăn uống" />
													<span>Ăn uống</span>
												</label>
											</p>
											<p>
												<label>
													<input name="locbangradio" type="radio" value="Hóa đơn" />
													<span>Hóa đơn</span>
												</label>
											</p>
											<p>
												<label>
													<input name="locbangradio" type="radio" value="Điện nước" />
													<span>Điện nước</span>
												</label>
											</p>
											<p>
												<label>
													<input name="locbangradio" type="radio" value="Y tế" />
													<span>Y tế</span>
												</label>
											</p>
											<p>
												<label>
													<input name="locbangradio" type="radio" value="Học phí" />
													<span>Học phí</span>
												</label>
											</p>
											<p>
												<label>
													<input name="locbangradio" type="radio" value="Khác" />
													<span>Khác</span>
												</label>
											</p>
											<input type="submit" name="locbangtrangchu" value="Lọc bảng"
												style="border-radius: 5%; background-color:#EE6E73; color:white;  border:none;padding:10px;cursor: pointer;width:100%" />
										</div>
									</form>
								</div>
							</th>
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
									<?php echo $row['chi'] ?>
								</td>
								<td>
									<?php echo $row['loai'] ?>
								</td>
								<td><a href="index.php?action=suachi&id_chi=<?php echo $row['id_chi'] ?>">Sửa</a>
									| <a href="index.php?action=xoachi&id_chi=<?php echo $row['id_chi'] ?>">Xoá</a>
								</td>
							</tr>
						</tbody>
					<?php } ?>
				</table>
			</div>

			<div>
				<form method="post">
					<div style="width: 100%; height: auto; background-color: #EE6E73; color: #EAF5E0;">
						<h3 style="font-family: baltica;font-weight: bold;padding: 5px;text-align:center">Thêm mới khoản chi tiêu
						</h3>
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
								<input type="text" name="noidung" placeholder="Trà sữa cho ny ne!..">
							</tr>
							<tr>
								<input type="date" name="ngay" placeholder="">
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
							<tr>
								<input type="number" name="chi" placeholder="Số tiền">
							</tr>
						</tbody>
					</table>
					<input type="submit" name="themchi" value="Thêm chi tiêu"
						style="border-radius: 5%; background-color:#EE6E73; color:white; margin-top:10px; border:none; padding:10px;cursor: pointer;">
				</form>
			</div>
		</div>
	</div>
</div>

<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>