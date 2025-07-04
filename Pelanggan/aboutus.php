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

    <!-- About Us -->
    <section id="about">
        <div class="about-1">
            <h1>TENTANG KAMI</h1>
            <p>JuraganLaptop menghadirkan produk-produk laptop berkualitas dari brand-brand ternama seperti
                Asus, MSI, Acer, Apple, dan berbagai jenis brand ternama lainnya. JuraganLaptop senantiasa berusaha
                untuk terus meningkatkan kualitas pelayanan kami, mulai dari kualitas produk, kualitas layanan penjualan,
                serta after-sales service. Didukung oleh staff yang telah berpengalaman dalam memberikan rekomendasi produk
                serta spesifikasi yang sesuai dengan kebutuhan anda.
            </p>
            <h2>Mengapa Harus Berbelanja di JuraganLaptop?</h2>
        </div>

        <div id="about-2">
            <div class="content-box-lg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="about-item text-center">
                                <i class="fas fa-tags">
                                    <h3>JAMINAN HARGA KOMPETITIF</h3>
                                    <hr>
                                    <p>Harga mampu bersaing dengan yang ada di pasaran. <br>
                                        Harga juga selalu update mengikuti perkembangan pasar. <br>
                                        Berikan penawaran terbaik anda dan kami akan berikan penawaran harga terbaik.
                                    </p>
                                </i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="about-item text-center">
                                <i class="fab fa-cc-mastercard">
                                    <h3>KEMUDAHAN PEMBAYARAN</h3>
                                    <hr>
                                    <p>Pembayaran dapat dilakukan melalui Alfamart, Indomaret, Go-Pay, BCA, BNI, BRI, ShopeePay,<br>
                                        dan masih banyak lagi. Banyaknya jenis pembayaran membuat pelanggan lebih mudah bertransaksi.
                                        <br>
                                    </p>
                                </i>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="about-item text-center">
                                <i class="far fa-handshake">
                                    <h3>TERPERCAYA</h3>
                                    <hr>
                                    <p>Modal dalam bertransaksi adalah kepercayaan dan <br>
                                        komunikasi yang baik antara pembeli dan penjual.<br>
                                        Kami memberikan jaminan barang sesuai <br>
                                        deskripsi dan kondisi yang kami tawarkan.
                                    </p>
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $queryVideo = mysqli_query($conn, "SELECT * FROM Video");
        while ($row = $queryVideo->fetch_assoc()) {
        ?>
            <div class="testimoni">
                <h2>Testimoni Dari Pelanggan</h2>
                <?php
                echo "<video src='../video/$row[namaVideo]' controls></video>" ?>
            </div>
        <?php
        }

        ?>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> <!-- Fontawesome JS -->
</body>

</html>