<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/loginregis.css">
    <link rel="shortcut icon" type="image/x-icon" href="../image/favicon.ico">
    <title>JuraganLaptop</title>
</head>
<body>
    <div class="login-wrapper">
        <form class="form" method="POST">
            <img src="../image/logoJL.png" alt="">
            <h2>REGISTER</h2>
            <hr class="hrsignup"><br>
            <div class="input-group">
                <input type="text" name="username" id="regUser" required>
                <label for="regUser">Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="password" id="regPassword" required>
                <label for="regPassword">Password</label>
            </div>
            <div class="input-group">
                <input type="password" name="cpassword" id="regRepassword" required>
                <label for="regRepassword">Repassword</label>
            </div>

            <button type="submit" name='submit' class="submit-btn">Register</button>
            <a href="login.php" class="register">Sudah memiliki akun?<br> Login</a>
            <?php 
                include '../config.php';

                if(isset($_POST['submit'])){
                    $user = $_POST['username'];
                    $pass = $_POST['password'];
                    $cpassword = $_POST['cpassword'];

                    if($pass == $cpassword){
                            $queryCheck = mysqli_query($conn, "SELECT username FROM Pelanggan WHERE username='$user'");
                            $countCheck = mysqli_num_rows($queryCheck);
                            if($countCheck > 0){
                                ?>
                                <div class="alert alert-danger mt-3">
                                    Username sudah ada yang menggunakan
                                </div>
                                <?php
                            }else{
                                $queryRegister = mysqli_query($conn, "INSERT INTO Pelanggan (username, password) 
                                VALUES ('$user','$pass')");
                                if($queryRegister){
                        ?>
                            <div class="alert alert-primary mt-3">
                                Register Berhasil
                            </div>
                        <?php
                                }else{
                        ?>
                            <div class="alert alert-danger mt-3">
                                Register Gagal
                            </div>
                        <?php
                                }
                            }
                            ?>
                            <?php
                    }   else {
                        ?>
                        <div class="alert alert-danger mt-3">
                            Password tidak sama
                        </div>
                        <?php
                    }
                }
            ?>
        </form>
        
        </div>
        
    </div>
</body>
</html>