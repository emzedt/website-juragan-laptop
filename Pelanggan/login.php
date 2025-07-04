<?php
    include '../config.php';

    session_start();

    error_reporting(0);

    if (isset($_SESSION['username'])) {
        header("Location: main.php");
    }

    if(isset($_POST['submit'])){
        $user = $_POST['loginUser'];
        $pass = $_POST['loginPassword'];

        $queryLogin = mysqli_query($conn, "SELECT * FROM Pelanggan WHERE username='$user' AND password='$pass'");
        if ($queryLogin->num_rows > 0) {
            $row = mysqli_fetch_assoc($queryLogin);
            $_SESSION['username'] = $row['username'];
            header("Location: main.php");
        } else {
            echo "<br>Username dan Password masih salah";
        }    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/loginregis.css">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="../image/favicon.ico">
    <title>JuraganLaptop</title>
</head>
<body>
    <div class="login-wrapper">
        <form class="form" method="POST">
            <img src="../image/logoJL.png" alt="">
            <h2>LOGIN</h2>
            <hr><br>
            <div class="input-group">
                <input type="text" name="loginUser" id="loginUser" required>
                <label for="loginUser">Username</label>
            </div>
            <div class="input-group">
                <input type="password" name="loginPassword" id="loginPassword" required>
                <label for="loginPassword">Password</label>
            </div>
            <button type="submit" name='submit' class="submit-btn">Login</button>
            <a href="register.php" class="register" title="">Belum memiliki akun?<br> Sign Up</a>
            
        </form>
    </div>
</div>
</body>
</html>