<?php
include 'config.php';

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

    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/contactus.css">
    <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">

    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body class="contactbg">
    <!-- top -->
    <div class="container-fluid">
        <table>
            <tbody>
                <tr>
                    <td width="81%">
                        <a class="navbar-brand" href="../TestLaptop/Pelanggan/main.php" style="color: #66A5FE; font-size: 22px; font-weight: 600; margin-right: 750px">
                            <img src="image/LogoJL.png" width="50" height="50" alt="Logo">JuraganLaptop
                        </a>
                    </td>
                    <td width="7%">
                        <a style="text-decoration: none; color: #299ee4" href="../TestLaptop/Pelanggan/logout.php"><i class="fa-solid fa-right-from-bracket" style="color: #299ee4"></i>Logout</a>
                    </td>
                    <td>
                        <a href="../TestLaptop/Pelanggan/cart.php" style="text-decoration: none; margin-right: 10px"><i class="fa-solid fa-cart-shopping"></i>
                        </a>
                    </td>
                    <td style="z-index: 99; margin-right: 10px">
                        <a href="../TestLaptop/Pelanggan/cart.php" style="text-decoration: none; margin-right: 10px">
                            <sup style="background: #083c8c; border-radius: 5px; font-weight: bold; margin-right: 13px; z-index: 99; color: white;">
                                <?php
                                include 'config.php';
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
                        <a class="nav-link" href="../TestLaptop/Pelanggan/main.php">Home</a>
                    </li>
                    <li class="nav-item2 dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Laptop
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../TestLaptop/Pelanggan/laptopgaming.php">Laptop Gaming</a></li>
                            <li><a class="dropdown-item" href="../TestLaptop/Pelanggan/laptopkerja.php">Laptop Kerja</a></li>
                        </ul>
                    </li>
                    <li class="nav-item2">
                        <a class="nav-link" href="../TestLaptop/Pelanggan/aboutus.php">Tentang Kami</a>
                    </li>
                    <li class="nav-item2">
                        <a class="nav-link" href="contactus.php">Kontak Kami</a>
                    </li>
                    <li class="nav-item2">
                        <a class="nav-link" href="../TestLaptop/Pelanggan/faq.php">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- <h2 style="text-align: center; font-family: 'URW'; margin-top: 20">KONTAK KAMI</h2> -->
    <div class="contactUs">
        <div class="title">
            <h2> CONTACT US </h2>
        </div>
        <h3 class="sent-notification"></h3>
        <div class="box">
            <div class="contact form">
                <h3 align="center" class="h3">SEND A MESSAGE</h3>
                <br>
                <form id="myForm">
                    <div class="formbox">
                        <div class="row50">
                            <div class="inputbox">
                                <span><label>Username</label></span>
                                <input id="name" type="text" value="<?php echo $_SESSION['username'] ?>" style="color:black" disabled>
                            </div>

                            <div class="inputbox">
                                <span><label>Email</label></span>
                                <input id="email" type="text" value="">
                            </div>
                        </div>

                        <div class="row50">
                            <div class="inputbox">
                                <span><label>Subject</label></span>
                                <input id="subject" type="text" placeholder="Subject Email">
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputbox">
                                <label>Pesan</label>
                                <textarea id="body" rows="13" placeholder="Tulis Pesan Anda"></textarea>
                            </div>
                        </div>

                        <div class="row100">
                            <div class="inputbox">
                                <input type="button" onclick="sendEmail()" value="send">
                            </div>
                        </div>

                    </div>
                </form>
            </div>

            <!-- Info -->
            <div class="contact info">
                <h3 align="center" class="h3"> Info </h3>
                <br>
                <p class="paragraf">Silahkan menghubungi kami di bawah jika ada kendala atau masalah terhadap barang yang telah dibeli</p>
                <br>
                <div class="infobox">
                    <!-- Info Map-->
                    <div>
                        <span><ion-icon name="location-outline"></ion-icon></span>
                        <p class="paragraf">&nbsp; Ruko JuraganLaptop <br>Jl. Serpong Garden</p>
                    </div>
                    <br>
                    <!-- Info Email-->
                    <div>
                        <span><ion-icon name="mail-outline"></ion-icon></span>
                        <a href="mailto:juraganlaptop@gmail.com">&nbsp; juraganlaptop@gmail.com</a>
                    </div>
                    <br>
                    <!-- Info Telpon-->
                    <div>
                        <span><ion-icon name="call-outline"></ion-icon></span>
                        <a href="tel:+626738648980">&nbsp; +62 673 864 8980</a>
                    </div>
                </div>
            </div>

            <!-- Map -->
            <div class="contact map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.4388016272196!2d106.63726161436176!3d-6.337165163767332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e485baa95541%3A0x2d1ec2f1fd0074f2!2sJl.%20Serpong%20Garden%2C%20Cibogo%2C%20Kec.%20Cisauk%2C%20Kabupaten%20Tangerang%2C%20Banten!5e0!3m2!1sen!2sid!4v1664802291299!5m2!1sen!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!-- footer -->
    <footer class="footer">
        <div class="container-footer">
            <div class="row-footer">
                <div class="footer-form">
                    <h4>JuraganLaptop</h4>
                    <ul>
                        <li><a href="../TestLaptop/Pelanggan/aboutus.php">Tentang Kami</a></li>
                    </ul>
                </div>
                <div class="footer-form">
                    <h4> Produk </h4>
                    <ul>
                        <li><a href="../TestLaptop/Pelanggan/laptopgaming.php">Laptop Gaming</a></li>
                        <li><a href="../TestLaptop/Pelanggan/laptopkerja.php">Laptop Kerja</a></li>
                    </ul>
                </div>
                <div class="footer-form">
                    <h4> Bantuan</h4>
                    <ul>
                        <li><a href="../TestLaptop/Pelanggan/contactus.php"> Kontak Kami</a></li>
                        <li><a href="../TestLaptop/Pelanggan/faq.php"> FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-form">
                    <h4>Pembayaran</h4>
                    <div class="social-links">
                        <img src="img/bankdki.png" alt="">
                        <img src="img/alfa.jpg" alt="">
                        <img src="img/bankbb.png" alt="">
                        <img src="img/bjb4.png" alt="">
                        <img src="img/bni2.png" alt="">
                        <img src="img/bri1.png" alt="">
                        <img src="img/dana.webp" alt="">
                        <img src="img/gopay.jpg" alt="">
                        <img src="img/indomaret.png" alt="">
                        <img src="img/jen.png" alt="">
                        <img src="img/link.png" alt="">
                        <img src="img/bca.png" alt="">
                        <img src="img/masterc.png" alt="">
                        <img src="img/ovo.png" alt="">
                        <img src="img/paypal1.png" alt="">
                        <img src="img/qr.png" alt="">
                        <img src="img/shop1.png" alt="">
                        <img src="img/visa.png" alt="">
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

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        function sendEmail() {
            var name = $("#name");
            var email = $("#email");
            var subject = $("#subject");
            var body = $("#body");

            if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)) {
                $.ajax({
                    url: 'sendEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        name: name.val(),
                        email: email.val(),
                        subject: subject.val(),
                        body: body.val()
                    },
                    success: function(response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                    }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }
    </script>
</body>

</html>