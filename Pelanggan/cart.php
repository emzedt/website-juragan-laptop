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

<!-- sdasdas -->

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

    <!---- cart items detail ---->

    <!-- <div class="container mt-5" style="width: 70%">
        <div class="alert alert-success" role="alert">
            Pembayaran Berhasil
        </div>
    </div> -->


    <div class="small-container cart-page">
        <table class="tablecart">
            <thead>
                <th width="30%">Produk</th>
                <th width="20%"></th>
                <th colspan="2" style="text-align:center">Qty</th>
                <th>Subtotal</th>

            </thead>
            <tbody>
                <?php
                include '../config.php';
                $user = $_SESSION['username'];

                $query = mysqli_query($conn, "SELECT * FROM Keranjang WHERE username = '$user'");
                while ($row = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <td class="kolomcart">
                            <div class="cart-info"></div>
                            <?php
                            echo "<img src='../fotoproduk/$row[foto]' width='100' height='100' style='margin-left:8px'>" ?>
                            <div>
                                <p><?php echo $row['nama_produk']; ?></p>

                                <small>Rp. <?php echo $row['harga_produk']; ?></small>
                                <br>
                            </div>
                        </td>
                        <td class="kolomcart">
                            <form action="" method="POST">
                                <button type="submit" name="buttonhapus" class="btn btn-danger" value="<?php echo $row['id']; ?>"><i class="fa-solid fa-trash"></i></button>
                                <?php
                                if (isset($_POST['buttonhapus'])) {
                                    $idh = $_POST['buttonhapus'];
                                    $queryhapus = mysqli_query($conn, "DELETE FROM Keranjang WHERE id='$idh'");
                                ?>
                                    <meta http-equiv="refresh" content="0; url=cart.php" />
                                <?php
                                }
                                ?>
                            </form>
                        </td>
                        <form method="POST">
                            <td class="kolomcart" style="text-align:center">
                                <input type="hidden" name="hargaqty" value="<?php echo $row['harga_produk']; ?>">
                                <input type="number" name="qty" value="<?php echo $row['quantity']; ?>" min="1">
                            </td>
                            <td style="text-align:center">
                                <button type="submit" name="submit" value="<?php echo $row['id']; ?>">Update</button>
                            </td>
                            <?php

                            if (isset($_POST['submit'])) {
                                $qty = $_POST['qty'];
                                $idq = $_POST['submit'];
                                $hargaqty = $_POST['hargaqty'];
                                $subtotal2 = $qty * $hargaqty;
                                $queryQuantity = mysqli_query($conn, "UPDATE keranjang SET quantity = '$qty', total_harga='$subtotal2' WHERE username='$user' AND id='$idq'");
                            ?>
                                <meta http-equiv="refresh" content="0; url=cart.php" />
                            <?php
                            }
                            ?>
                        </form>
                        <td class="kolomcart"><?php $quant = $row['quantity'];
                                                $harga = $row['harga_produk'];
                                                $subtotal = $quant * $harga;
                                                echo "Rp. " . $subtotal ?> </td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

        <div class="total-price">
            <table>
                <tr>
                    <td class="kolomcart">Total</td>
                    <td class="kolomcart">
                        <?php
                        $queryTotal = mysqli_query($conn, "SELECT sum(total_harga) as totalan FROM Keranjang WHERE username = '$user'");
                        while ($total = $queryTotal->fetch_assoc()) {
                            $totalHarga = $total['totalan'];
                            echo "Rp. " . $totalHarga;
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="container">
            <h2 align="center" style="margin:10px;">METODE PEMBAYARAN</h2>

            <form method="post">
                <div class="form-group">
                    <label for="#nama">Nama Lengkap</label>
                    <input class="form-control" type="text" name="namalengkap" id="nama">
                </div>
                <?php
                // }
                ?>
                <label for="#alamat">Alamat</label>
                <input required class="form-control" type="text" name="alamat" placeholder="Masukkan Alamat" id="alamat" required>
                <label for="#ekspedisi">Pilih Ekspedisi (Free Ongkir)</label>
                <div class="form-group">
                    <select name="ekspedisi" id="ekspedisi" class="form-control" required>
                        <option value="JNE" selected>JNE</option>
                        <option value="JNT">JNT</option>
                        <option value="Sicepat">SiCepat</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="#catatan">Catatan</label>
                    <textarea class="form-control" cols="30" rows="4" name="comment" placeholder="Masukkan Catatan" id="catatan" required></textarea>
                </div>

                <div class="form-group" style="overflow-x:auto;">
                    <label>Pilih Metode Pembayaran</label>
                    <table border=0 cellpadding="10" class="table">
                        <tr class="baris">
                            <th class="kolom"><input type="radio" name="checkbayar" value="Alfa"><img src="../img/alfa.jpg" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="Indomaret"><img src="../img/indomaret.png" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="GOPAY"><img src="../img/gopay.jpg" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="BCA"><img src="../img/logo-bca.png" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="BNI"><img src="../img/bni.png" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="BRI"><img src="../img/bri.png" width="60px" height="20px"></th>
                        </tr>
                        <tr class="baris">
                            <th class="kolom"><input type="radio" name="checkbayar" value="ShopeePay"><img src="../img/spay.webp" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="OVO"><img src="../img/ovo.png" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="DANA"><img src="../img/dana.webp" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="LinkAja"><img src="../img/la.jpg" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="Jenius"><img src="../img/jen.png" width="60px" height="20px"></th>
                            <th class="kolom"><input type="radio" name="checkbayar" value="QRIS"><img src="../img/qr.png" width="60px" height="20px"></th>
                        </tr>
                    </table>
                    <?php
                    $currentDate = new DateTime();
                    $datenow = $currentDate->format('Y-m-d');
                    ?>
                </div>
                <div class="button-pay">
                    <button type="submit" name="checkout" class="btn-form-pay"><i class="fa-solid fa-money-bill"></i> CHECK OUT</button>
                </div>
            </form>
            <?php
            if (isset($_POST['checkout'])) {
                $queryKeranjang = mysqli_query($conn, "SELECT * FROM Keranjang WHERE username='$user'");
                while ($baris = $queryKeranjang->fetch_assoc()) {
                    $nama = $_POST['namalengkap'];
                    $alamat = $_POST['alamat'];
                    $ekspedisi = $_POST['ekspedisi'];
                    $catatan = $_POST['comment'];
                    $metode = $_POST['checkbayar'];
                    $idproduk = $baris['id'];
                    $qty = $baris['quantity'];
                    $totalharga = $baris['total_harga'];

                    $queryMasuk = mysqli_query($conn, "INSERT INTO checkout (nama_lengkap, alamat, ekspedisi, catatan, metode, quantity, totalharga, tanggal_bayar, idProduk) 
                    VALUES ('$nama', '$alamat', '$ekspedisi', '$catatan', '$metode', '$qty', '$totalharga', '$datenow', '$idproduk')");
                    $queryCheckout = mysqli_query($conn, "SELECT * FROM checkout WHERE nama_lengkap='$nama'");
                    $barisQuaryMasuk = mysqli_num_rows($queryCheckout);
                    if ($barisQuaryMasuk > 0) {
                        $queryHapusKeranjang = mysqli_query($conn, "DELETE FROM Keranjang WHERE username='$user'");
            ?>
                        <meta http-equiv="refresh" content="0; url=cart.php" />
            <?php
                    } else {
                        echo "Failed";
                    }
                }
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <!-- Fontawesome JS -->
</body>

</html>