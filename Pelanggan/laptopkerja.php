<?php
include '../config.php';

session_start();
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}

// Penanganan Add to Cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_add_to_cart'])) {
	$idcard = $_POST['submit_add_to_cart'];
	$usercard = $_SESSION['username'];
	$namacard = $_POST['namaproduk'];
	$fotocard = $_POST['foto'];
	$hargacard = $_POST['hargaproduk'];
	$stokcard = 1;
	$totalcard = $hargacard;

	// Cek apakah produk sudah ada di keranjang
	$queryCheck = mysqli_query($conn, "SELECT quantity FROM Keranjang WHERE username='$usercard' AND id='$idcard'");
	if (mysqli_num_rows($queryCheck) > 0) {
		$existing = mysqli_fetch_assoc($queryCheck);
		$newQuantity = $existing['quantity'] + 1;
		$newTotal = $newQuantity * $hargacard;

		mysqli_query($conn, "UPDATE Keranjang SET quantity='$newQuantity', total_harga='$newTotal' WHERE username='$usercard' AND id='$idcard'");
	} else {
		mysqli_query($conn, "INSERT INTO Keranjang (username, id, foto, nama_produk, harga_produk, quantity, total_harga) 
        VALUES ('$usercard', '$idcard', '$fotocard', '$namacard', '$hargacard', '1', '$hargacard')");
	}

	// Redirect agar tidak double submit saat refresh
	header("Location: laptopkerja.php");
	exit;
}

$queryLaptop = mysqli_query($conn, "SELECT P.id, P.nama_produk, P.foto, P.harga_produk, P.foto, P.detail, K.nama FROM produk P JOIN Kategori K ON P.kategori_id=K.id AND K.nama='Laptop Kerja'");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>JuraganLaptop</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="shortcut icon" type="image/x-icon" href="../image/favicon.ico">

	<!-- bootstrap -->
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

	<!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../fontawesome/css/all.css">
</head>

<body>
	<!-- top -->
	<div class="container-fluid">
		<table>
			<tbody>
				<tr>
					<td width="81%">
						<a class="navbar-brand" href="main.php" style="color: #66A5FE; font-size: 22px; font-weight: 600; margin-right: 750px">
							<img src="../image/LogoJL.png" width="50" height="50" alt="Logo">JuraganLaptop
						</a>
					</td>
					<td width="7%">
						<a style="text-decoration: none; color: #299ee4" href="logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #299ee4"></i>Logout</a>
					</td>
					<td>
						<a href="cart.php" style="text-decoration: none; margin-right: 10px"><i class="fa-solid fa-cart-shopping"></i>
						</a>
					</td>
					<td style="z-index: 99; margin-right: 10px" width="3%">
						<a href="cart.php" style="text-decoration: none; margin-right: 10px">
							<sup style="background: #083c8c; border-radius: 5px; font-weight: bold; margin-right: 13px; z-index: 99; color: white;">
								<?php
								include '../config.php';
								$user = $_SESSION['username'];
								$queryCheckSup = mysqli_query($conn, "SELECT SUM(quantity) as Total FROM Keranjang WHERE username='$user'");
								$data = $queryCheckSup->fetch_assoc();
								$total = $data['Total'] ?? 0;

								echo "&nbsp;" . $total . "&nbsp;";
								while ($data = $queryCheckSup->fetch_assoc()) {
									if (empty($data['Total'])) {
										echo "&nbsp;" . "0" . "&nbsp;";
									} else {
										echo "&nbsp";
										echo $data['Total'];
										echo "&nbsp";
									}
								}
								?>
							</sup>
						</a>
					</td>
					<td>
						<a><?php echo $_SESSION['username'] ?><i class="fa-regular fa-user"></i></a>
					</td>
				</tr>
			</tbody>
		</table>
	</div>

	<nav class="navbar navbar-expand-lg">
		<div class="container-fluid">
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item2">
						<a class="nav-link" href="main.php">Home</a>
					</li>
					<li class="nav-item2 dropdown">
						<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Laptop
						</a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="laptopgaming.php">Laptop Gaming</a></li>
							<li><a class="dropdown-item" href="laptopkerja.php">Laptop Kerja</a></li>
						</ul>
					</li>
					<li class="nav-item2">
						<a class="nav-link" href="aboutus.php">Tentang Kami</a>
					</li>
					<li class="nav-item2">
						<a class="nav-link" href="../contactus.php">Kontak Kami</a>
					</li>
					<li class="nav-item2">
						<a class="nav-link" href="faq.php">FAQ</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid py-0 px-0">
		<h2 style="text-align: center; font-family: 'URW'; margin-top: 20px">LAPTOP KERJA</h2>
		<div class="container">
			<div class="row mt-5">
				<?php
				while ($row = $queryLaptop->fetch_assoc()) {
				?>
					<div class="col-sm-6 col-md-3 mb-5">
						<div class="card" style="width: 14rem; margin-right: 20px; margin-left:65px">
							<?php
							echo "<img src='../fotoproduk/$row[foto]' class='card-img-top' style='margin-bottom: 1px;' height=220 width=200>";
							?>
							<div class="card-body">
								<hr>
								<p class="card-text"><?php echo $row['nama_produk'] ?></p>
								<p><?php echo "Rp. " . $row['harga_produk'] ?></p>
								<div class="d-grid gap-2 d-md-flex justify-content-md-end">
									<a href="#popup<?php echo $row['id']; ?>"><button class="btn btn-primary btn-sm me-md-2" type="button">Detail</button></a>
									<form action="" method="post">
										<input type="hidden" name='namaproduk' value="<?php echo $row['nama_produk']; ?>">
										<input type="hidden" name="hargaproduk" value="<?php echo $row['harga_produk']; ?>">
										<input type="hidden" name="foto" value="<?php echo $row['foto']; ?>">
										<button class="btn btn-success btn-sm" name='submit_add_to_cart' type="submit" value="<?php echo $row['id']; ?>">Add to Cart</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- popup laptop gaming -->
					<div class="popup" id="popup<?php echo $row['id']; ?>">
						<div class="popup_content">
							<div class="popup_img">
								<<?php
									echo "<img src='../fotoproduk/$row[foto]' class='card-img-top' style='margin-bottom: 1px;' height=420 width=100>";
									?>
									<a href="#dfa" class="popup_close">&times;</a>
							</div>
							<div class="popup_header">
								<h1><?php echo $row['nama_produk']; ?></h1>
								<h2>Rp. <?php echo $row['harga_produk']; ?></h2>
							</div>
							<div class="popup_text">
								<p><?php echo $row['detail']; ?></p>
							</div>
							<form action="" method="post">
								<input type="hidden" name="namaproduk" value="<?= $row['nama_produk']; ?>">
								<input type="hidden" name="hargaproduk" value="<?= $row['harga_produk']; ?>">
								<input type="hidden" name="foto" value="<?= $row['foto']; ?>">
								<button class="btn btn-success btn-sm" name="submit_add_to_cart" type="submit" value="<?= $row['id']; ?>">Add to Cart</button>
							</form>
						</div>
					</div>
				<?php
				}
				?>
			</div>
		</div>

		<!-- footer -->
		<footer class="footer">
			<div class="container-footer">
				<div class="row-footer">
					<div class="footer-form">
						<h4>JuraganLaptop</h4>
						<ul>
							<li><a href="aboutus.php">Tentang Kami</a></li>
						</ul>
					</div>
					<div class="footer-form">
						<h4> Produk </h4>
						<ul>
							<li><a href="laptopgaming.php">Laptop Gaming</a></li>
							<li><a href="laptopkerja.php">Laptop Kerja</a></li>
						</ul>
					</div>
					<div class="footer-form">
						<h4> Bantuan</h4>
						<ul>
							<li><a href="../contactus.php"> Kontak Kami</a></li>
							<li><a href="faq.php"> FAQ</a></li>
						</ul>
					</div>
					<div class="footer-form">
						<h4>Pembayaran</h4>
						<div class="social-links">
							<img src="../img/bankdki.png" alt="">
							<img src="../img/alfa.jpg" alt="">
							<img src="../img/bankbb.png" alt="">
							<img src="../img/bjb4.png" alt="">
							<img src="../img/bni2.png" alt="">
							<img src="../img/bri1.png" alt="">
							<img src="../img/dana.webp" alt="">
							<img src="../img/gopay.jpg" alt="">
							<img src="../img/indomaret.png" alt="">
							<img src="../img/jen.png" alt="">
							<img src="../img/link.png" alt="">
							<img src="../img/bca.png" alt="">
							<img src="../img/masterc.png" alt="">
							<img src="../img/ovo.png" alt="">
							<img src="../img/paypal1.png" alt="">
							<img src="../img/qr.png" alt="">
							<img src="../img/shop1.png" alt="">
							<img src="../img/visa.png" alt="">
						</div>
					</div>
				</div>
			</div>
			<div>
				<hr style="width: 75%; margin: auto; margin-top: 30px; margin-bottom: 30px">
				<p style="text-align: center; margin-bottom:-20px; font-family: Arial, Helvetica, sans-serif">COPYRIGHT &copy; 2022 JuraganLaptop. ALL RIGHTS RESERVED.</p>
			</div>
		</footer>

		<!-- JavaScript Bundle with Popper -->
		<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
		<!-- Fontawesome JS -->
</body>

</html>