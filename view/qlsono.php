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
							<th style="width: 8%;">Trả nợ</th>
							<th style="width: 8%;">Loại nợ</th>
							<th style="width: 46%;">Nội dung</th>
							<th style="width: 15%;">Ngày</th>
							<th style="width: 15%;">Số nợ</th>
							<th style="width: 8%;">Thao tác</th>
						</tr>
					</thead>
					<?php while ($row = $kq->fetch_assoc()) { ?>
						<tbody>
							<tr>
								<td>
									<?php if ($row['trano'] == 1) {
										echo "Đã trả";
									} else { ?>
										<a href="index.php?action=trano&id_no=<?php echo $row['id_no'] ?>">Trả nợ</a>
									<?php } ?>
								</td>
								<td>
									<?php if ($row['loai'] == 1) {
										echo 'Chủ nợ';
									} else {
										echo "Con nợ";
									} ?>
								</td>
								<td>
									<?php echo $row['noidung'] ?>
								</td>
								<td>
									<?php echo $row['ngay'] ?>
								</td>
								<td>
									<?php echo $row['sono'] ?>
								</td>
								<td><a href="index.php?action=suano&id_no=<?php echo $row['id_no'] ?>">Sửa</a> | <a
										href="index.php?action=xoano&id_no=<?php echo $row['id_no'] ?>">Xoá</a></td>
							</tr>

						</tbody>
					<?php } ?>
				</table>
			</div>

			<div>
				<form method="post">
					<div style="width: 100%; height: auto; background-color: #EE6E73; color: #EAF5E0;">
						<h3 style="font-family: baltica;font-weight: bold;padding:5px;text-align:center">Thêm mới khoản nợ</h3>
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
								<td>
									<label>
										<input name="loai" type="radio" checked />
										<span>Chủ nợ</span>
									</label> |

									<label>
										<input name="loai" type="radio" />
										<span>Con nợ</span>
									</label>
									<p>Đặt màu</p>
									<p>
										<label>
											<input name="group1" type="radio" />
											<span>Đỏ</span>
										</label>
									</p>
									<p>
										<label>
											<input name="group1" type="radio" />
											<span>Vàng</span>
										</label>
									</p>
									<p>
										<label>
											<input name="group1" type="radio" />
											<span>Xanh</span>
										</label>
									</p>
								</td>
								<td><input type="text" name="noidung" placeholder="Sao lại nợ vậy cưng!.."></td>
							</tr>
							<tr>
								<td><input type="date" name="ngay" value=""></td>
								<td><input type="number" name="sono" placeholder="Nợ mấy đồng hả?"></td>
							</tr>
						</tbody>
					</table>
					<input type="submit" name="themno" value="Thêm khoản nợ"
						style="border-radius: 5%; background-color:#EE6E73; color:white; margin-top:10px; border:none; padding:10px;cursor: pointer;">
				</form>
			</div>
		</div>
	</div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include 'layout/layout.php'; ?>