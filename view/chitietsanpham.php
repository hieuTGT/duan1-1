<?php

if (isset($_GET['MA_SP'])) {
	$masp = $_GET['MA_SP'];
	$sql = "SELECT * FROM `sanpham` where MA_SP='$masp'";
	$rs = mysqli_query($conn, $sql);
	$result = mysqli_fetch_array($rs);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	<div class="container-fluid">
		<form action="index.php?" method="get" accept-charset="utf-8">
			<hr class="mar-l-r">
			<h5 class="mar-l-r"><?php echo mb_strtoupper($result['TEN_SP']) ?> </h5>
			<input hidden name="tensp" value="<?php echo $result['TEN_SP'] ?>">
			<input hidden name="MA_SP" value="<?php echo $masp ?>">
			<hr class="mar-l-r">
			<div class="result mar-l-r">
				<div class="col-lg-5 ">
					<center>
						<img class="anhsp" src="img/<?php echo $result['Anh_SP'] ?>">
					</center>
				</div>
				<div class="col-1"></div>
				<div class="col-lg-4 ">
					<h1 style="color: #e10c00"><?php echo number_format($result['GIA_SP']) . ' ₫' ?></h1>
					<div class="card">
						<div class="khuyenmai">
							<h4>KHUYẾN MÃI</h4>
							<?php $sql2 = "SELECT MA_KM from sanphamkhuyenmai where MA_SP='$masp'";
							$rs2 = mysqli_query($conn, $sql2);
							$km = 0;
							while ($row2 = mysqli_fetch_array($rs2)) {
								$makm = $row2['MA_KM'];
								$sql3 = "SELECT * from khuyenmai where MA_KM=$makm";
								$rs3 = mysqli_query($conn, $sql3);
								while ($row3 = mysqli_fetch_array($rs3)) {
									$km = $km + $row3['GIAMGIA'];
									echo 	'<p> <i class="fas fa-check xanhlc"></i> ' . $row3['TENKM'] . ' </p>';
								}
							}	?>
							<input hidden name="km" value="<?php echo $km; ?>">
						</div>
					</div><br>
					<div class=" col-12 card  ">
						<div class="khuyenmai">
							<h4>MÀU</h4>
							<div class="form-group  ">
								<div class="btn-group  col-12 m-auto result">
									<?php $sql_mau = "SELECT * FROM `mau_sp` where MA_SP='$masp'";
									$rs_mau = mysqli_query($conn, $sql_mau);
									while ($kq_mau = mysqli_fetch_array($rs_mau)) { ?>
										<div class=" custom-checkbox custom-control col-4 ">
											<input type="radio" class="custom-control-input" id="<?php echo $kq_mau['MAU']; ?>" name="mau" value="<?php echo $kq_mau['MAU']; ?>" required>
											<label class="custom-control-label" for="<?php echo $kq_mau['MAU']; ?>">
												<h5><?php echo $kq_mau['MAU']; ?></h5>
											</label>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div><br>
					<h4>Số lượng mua : <select class="form-control-sm" name="slmua">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
						</select>
					</h4>
					<button type="submit" name="action" value="themgiohang" class="btn  btn-lg btn-block btmua"> Thêm Giỏ Hàng <i class="fas fa-cart-plus"></i></button>
					<button type="submit" class="btn btn-lg btn-block btmua1" name="action" value="muahang"> Mua Hàng <i class="fas fa-cart-arrow-down"></i></button>
				</div>
			</div>

		</form>
		<hr class="mar-l-r">
		<div class="result mar-l-r">
			<div class="col-lg-6 ">
				<h5>Mô Tả</h5>
				<span><?php echo $result['MoTa'] ?></span>
				<hr>
				<?php include_once('view/binhluan.php'); ?>
			</div>
			<div class="col-2"></div>

			<?php $sql4 = "SELECT * FROM `thongtinsp` where MA_SP='$masp'";
			$rs4 = mysqli_query($conn, $sql4);
			$row4 = mysqli_fetch_array($rs4); ?>
			<div class="col-lg-4 ">
				<h5>Thông số kỹ thuật</h5>
				<div class=" result fonttt">
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> Màn Hình : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['ManHinh'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> Hệ điều hành : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['HDH'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> Camera sau : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['CameraS'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> Camera trước : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['CameraT'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> CPU : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['CPU'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> RAM : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['Ram'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> Bộ nhớ trong : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['BoNhoTrong'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> Sim : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['Sim'] ?> </p>
					</div>
					<div class="col-12 bort"></div>
					<div class="col-4">
						<p> Pin : </p>
					</div>
					<div class="col-8">
						<p> <?php echo $row4['Pin'] ?> </p>
					</div>
				</div>
			</div>

		</div>
	</div>	
</body>
</html>
