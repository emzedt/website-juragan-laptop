<?php 
include '../config.php';

session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}

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
					<td style="z-index: 99; margin-right: 10px"  width="3%">
						<a href="cart.php" style="text-decoration: none; margin-right: 10px">
						<sup style="background: #083c8c; border-radius: 5px; font-weight: bold; margin-right: 13px; z-index: 99; color: white;">
								<?php 
								include '../config.php';
								$user = $_SESSION['username'];
								$queryCheckSup = mysqli_query($conn, "SELECT id, sum(quantity) as Total FROM Keranjang WHERE username='$user'");
								while($data = $queryCheckSup->fetch_assoc()){
									if(empty($data['Total'])){
                                        echo "&nbsp;"."0"."&nbsp;";
                                    }else{
                                        echo "&nbsp"; echo $data['Total']; echo "&nbsp"; 
                                    }
								}
								?>
						</sup>
						</a>
					</td>
					<td>
						<a><?php echo $_SESSION['username']?><i class="fa-regular fa-user"></i></a>
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

	<div class="box">
		<p class="heading">FAQ</p>
		<div class="faq">
			<details>
				<summary>Perbedaan Laptop Gaming dan Laptop Kerja</summary>
				<p class="text">
					Laptop Gaming diperuntukkan pada kegiatan berat seperti edit, kerja, dan tentunya GAMING.<br>Sementara Laptop Kerja diperuntukkan pada kegiatan ringan seperti microsoft office, edit, dan tidak untuk GAMING<br><br>
					Spek yang dimiliki kedua laptop tersebut juga berbeda. Spek Laptop Gaming memang dikhususkan untuk tahan banting untuk kegiatan apapun. Spek Laptop Kerja digunakan hanya untuk kegiatan ringan dan kerja.
				</p>
			</details>
			<details>
				<summary>PEMBAYARAN</summary>
				<p class="text">
					1. Pilih barang yang mau dibeli <br>
					2. Klik buy jika sudah yakin <br>
					3. Klik button detail jika ingin melihat speknya terlebih dahulu <br>
					4. Jika mengklik button buy, akan mengarah ke payment. Pada menu payment akan diminta memasukkan nama, alamat, metode pembayaran. <br>
					5. Selesai
				</p>
			</details>
			<details>
				<summary>Berapa Lama Paket Saya Datang?</summary>
				<p class="text">
					Sesuai pedoman standar pengiriman Indonesia, pengiriman standar umumnya 2-3 bisnis sementara ekspres dalam waktu 2 hari kerja sejak waktu pengiriman. Waktu pemrosesan kami dapat bervariasi, namun umumnya diselesaikan dalam waktu 1-2 hari kerja sejak pesanan Anda dilakukan. Jangan ragu untuk menghubungi kami jika Anda memiliki pesanan yang mendesak dan kami akan berusaha untuk memprioritaskan pemrosesan.
				</p>
			</details>
			<details>
				<summary>Apakah Bisa Refund Barang?</summary>
				<p class="text">
					Barang yang sudah dikirim dan diterima oleh pembeli tidak dapat dikembalikan.
				</p>
			</details>
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

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>	<!-- Fontawesome JS -->
</body>
</html>