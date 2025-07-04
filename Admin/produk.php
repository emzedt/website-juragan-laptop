<?php
session_start();
if (!isset($_SESSION['usernameAdmin'])) {
    header("Location: loginadmin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="../image/favicon.ico">
    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Fontawesome CSS -->
	<link rel="stylesheet" href="../fontawesome/css/all.css">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-1">JuraganLaptop</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Kategori -->
            <li class="nav-item">
                <a class="nav-link" href="kategori.php">
                    <i class="fa-regular fa-rectangle-list"></i>
                    <span>Kategori</span></a>
            </li>

            <!-- Nav Item - Produk -->
            <li class="nav-item">
                <a class="nav-link" href="produk.php">
                    <i class="fa-solid fa-laptop"></i>
                    <span>Produk</span></a>
            </li>

            <!-- Nav Item - Slide Show -->
            <li class="nav-item">
                <a class="nav-link" href="slide.php">
                    <i class="fa-solid fa-panorama"></i>
                    <span>Slide Show</span></a>
            </li>

            <!-- Nav Item - Video -->
            <li class="nav-item">
                <a class="nav-link" href="video.php">
                    <i class="fa-solid fa-video"></i>
                    <span>Video</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                User
            </div>

            <!-- Nav Item - Kategori -->
            <li class="nav-item">
                <a class="nav-link" href="pelanggan.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pelanggan</span></a>
            </li>

            <!-- Nav Item - Produk -->
            <li class="nav-item">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Admin</span></a>
            </li>
            
            <!-- Divider -->
            <hr class="sidebar-divider">

            <li class="nav-item">
                <a class="nav-link" href="logoutAdmin.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                                                
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <div class="nav-link dropdown-toggle" href="#">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['usernameAdmin'] ?></span>
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <div class="mt-2">
                    <h3 style="text-align: center">Tambah Produk</h3>
                    <div class="container" style="display: flex; justify-content: center; border: 1px solid black; width: 500px; border-radius: 30px">
                        
                        <form method="POST" enctype="multipart/form-data" id="my-form" class="mt-3 mb-3">
                            <label for="#namkat">Pilih Kategori Laptop</label>
                            <select name="namakategori" class="form-control" id="namkat" require>
                                <?php
                                include '../config.php';
                                
                                $sql = mysqli_query($conn, "SELECT * FROM Kategori");
                                while($row = $sql->fetch_assoc()){
                                    ?>
                                    <option value="<?php echo $row['id']; ?> "><?php echo $row['nama']; ?></option> <br>
                                    <?php
                                }
                                ?>
                            </select> <br>
                            <input type="text" name="namaProduk" placeholder="Nama Produk" class="form-control" require> <br>
                            <input type="number" name="hargaProduk" placeholder="Harga Produk" class="form-control" require> <br>
                            <label for="$foto">Foto Produk</label>
                            <input type="file" name="fotod" class="form-control" id="foto"> <br>
                            <textarea name="detail" placeholder="Detail Produk" class="form-control" cols="30" rows="10"></textarea> <br>
                            <select name="ketersediaan" class="form-control"> <br>
                                <option value="tersedia" selected>tersedia</option>
                                <option value="habis">habis</option>
                            </select> <br>
                            <button type="submit" name="simpan" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                    <?php 
                    include '../config.php';

                    if(isset($_POST["simpan"]))
                    {
                        $kategori = $_POST['namakategori'];
                        $nama = $_POST["namaProduk"];
                        $harga = $_POST['hargaProduk'];
                        
                        $fotod        = $_FILES['fotod']['name'];
                        $titik        = explode('.', $fotod);
                        $ekstensifoto = strtolower(end($titik));
                        $ukuranfoto   = $_FILES['fotod']['size'];
                        $fotod_tmp    = $_FILES['fotod']['tmp_name'];
                        move_uploaded_file($fotod_tmp, '../fotoproduk/'.$fotod);

                        $detail = $_POST['detail'];
                        $stok = $_POST['ketersediaan'];

                            $sql = mysqli_query($conn, "INSERT INTO produk (kategori_id, nama_produk, harga_produk, foto, detail, ketersediaan_stok) 
                            VALUES ('$kategori', '$nama', '$harga', '$fotod', '$detail',  '$stok')");

                            if($sql){
                                echo "Post has been saved successfully";
                            } 
                            else
                            {
                                echo "Unable to save post";
                            }
                    }

                    ?>
                </div> <br> <br>

                <!-- Content Table Tampilan -->
                <div class="container">
                    <h3>List Produk</h3>
                        <table class="table">
                            
                            <thead class="table-dark">
                                <th style="text-align: center">Id</th>
                                <th style="text-align: center">Kategori ID</th>
                                <th style="text-align: center">Nama Produk</th>
                                <th style="text-align: center">Harga Produk</th>
                                <th style="text-align: center">Foto</th>
                                <th style="text-align: center">Detail</th>
                                <th style="text-align: center">Ketersediaan Stok</th>
                                <th style="text-align: center" colspan="2">Aksi</th>
                            </thead>
                            <tbody class="table-striped">
                                <?php 
                                    include '../config.php';

                                    $sql    = "SELECT * FROM Produk";
                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) 
                                    {
                                        echo '<tr>';
                                        echo '<br><td style="text-align: center">'.$row['id'].'</td>';
                                        echo '<td style="text-align: center">'.$row['kategori_id'].'</td>';
                                        echo '<td style="text-align: center">'.$row['nama_produk'].'</td>';
                                        echo '<td style="text-align: center">'.$row['harga_produk'].'</td>';
                                        echo "<td><img src='../fotoproduk/$row[foto]' height=85 width=100></td>";
                                        echo '<td>'.$row['detail'].'</td>';
                                        echo '<td style="text-align: center">'.$row['ketersediaan_stok'].'</td>';
                                        echo '<td>'; ?> 
                                        
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modal<?php echo $row['id']; ?>">Edit</a>
                                        <div class="modal fade" id="modal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" enctype="multipart/form-data">
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Id Produk</label>
                                                                <input type="text" class="form-control" value="<?php echo $row['id']; ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Kategori Id</label>
                                                                <select name="kategorip" class="form-control"> <br>
                                                                    <option value="1" selected>Laptop Gaming</option>
                                                                    <option value="2">Laptop Kerja</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Nama Produk</label>
                                                                <input type="text" name="namap" class="form-control" value="<?php echo $row['nama_produk']; ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Harga Produk</label>
                                                                <input type="number" name="hargap" class="form-control" value="<?php echo $row['harga_produk']; ?>">
                                                            </div>
                                                            <div class="form-group">                                                                                                                              
                                                                <div class="foto-produk" style="text-align: center">
                                                                    <p style="font-weight: bold; color: black">Foto Produk Sekarang</p>
                                                                    <?php 
                                                                    echo "<img src='../fotoproduk/$row[foto]' height=150 width=200>";
                                                                    ?> 
                                                                </div>  
                                                                <label for="exampleFormControlInput1">Foto <br> 
                                                                    <div class="alert alert-danger mt-3">
                                                                        Nama file tidak boleh ada (!,?,#,@,$,%, dan karakter spesial lainnya)
                                                                    </div>
                                                                </label>                                                     
                                                                <input type="file" name="fotop" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Detail</label>
                                                                <textarea name="detailp" cols="30" rows="10" class="form-control"><?php echo $row['detail'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleFormControlInput1">Ketersediaan Stok</label>
                                                                <select name="ketersediaanp" class="form-control"> <br>
                                                                    <option value="tersedia" selected>tersedia</option>
                                                                    <option value="habis">habis</option>
                                                                </select> <br>
                                                            </div>
                                                            <button type="submit" name="buttonedit" class="btn btn-primary" value="<?php echo $row['id']; ?>">Save changes</button>
                                                            <?php 
                                                                
                                                                    if(isset($_POST['buttonedit'])){
                                                                        $idp = $_POST['buttonedit'];

                                                                        $kategoriproduk = $_POST['kategorip'];
                                                                        $namaproduk = $_POST['namap'];
                                                                        $hargaproduk = $_POST['hargap'];

                                                                        if($_FILES['fotop']['name']=='')
                                                                        {
                                                                            $fotoproduk = $row['foto'];
                                                                            $fotoproduk_tmp = $_FILES['fotop']['tmp_name'];
                                                                            move_uploaded_file($fotoproduk, '../fotoproduk/'.$fotoproduk);
                                                                        }else{
                                                                            $fotoproduk = $_FILES['fotop']['name'];
                                                                            $fotoproduk_tmp = $_FILES['fotop']['tmp_name'];
                                                                            move_uploaded_file($fotoproduk, '../fotoproduk/'.$fotoproduk);
                                                                        }
                                                                        

                                                                        $detailproduk = $_POST['detailp'];
                                                                        $stokproduk = $_POST['ketersediaanp'];

                                                                        $updateTabel = mysqli_query($conn, "UPDATE produk SET kategori_id='$kategoriproduk', nama_produk='$namaproduk',
                                                                        harga_produk='$hargaproduk', foto='$fotoproduk', detail='$detailproduk', ketersediaan_stok='$stokproduk'
                                                                        WHERE id='$idp';
                                                                        ");
                                                                    ?>
                                                                        <meta http-equiv="refresh" content="0; url=produk.php"/>
                                                                    <?php
                                                                } 
                                                            ?>
                                                        </form>
                                                    </div>    
                                                </div>
                                            </div>
                                        </div>
                                        <?php 
                                        echo '</td>';
                                        echo '<td>';?>
                                        <form action="" method="POST">
                                            <button type="submit" name="buttonhapus" class="btn btn-danger" value="<?php echo $row['id']; ?>">Hapus</button>
                                            <?php 
                                                if(isset($_POST['buttonhapus'])){
                                                    $id = $_POST['buttonhapus'];
                                                    $queryhapus = mysqli_query($conn, "DELETE FROM Produk WHERE id='$id'");
                                                    ?>
                                                    <meta http-equiv="refresh" content="0; url=produk.php"/>
                                                    <?php
                                                }
                                            ?>
                                        </form>
                                        <?php
                                        echo '</td>';
                                        echo '<tr>';
                                    }
                                    ?>
                            </tbody>
                        </table>
                </div>
                <!-- End of Content Table Tampilan -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logoutAdmin.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

</body>

</html>