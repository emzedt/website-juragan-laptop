<?php
include '../config.php';

if (isset($_SESSION['usernameAdmin'])) {
    header("Location: dashboard.php");
}

if(isset($_POST['submit'])){
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$check = isset($_POST['setcookie'])?$_POST['setcookie']:'';
	$sql = mysqli_query($conn, "SELECT * FROM admin WHERE usernameAdmin='$user' AND password='$pass'");
	$result = mysqli_num_rows($sql);
	if($result>0){
		session_start();
		$_SESSION['usernameAdmin'] = "$user";
		if($check){
			date_default_timezone_set('Asia/Jakarta');
			setcookie("kunjunganTerakhir", date('d-m-Y H:i:s'), time() + 3600);
			setcookie("username", $user, time() + 3600);
			setcookie("password", $pass, time() + 3600);
			header("Location: dashboard.php");
		}
	}else {
		echo "<b> LOGIN GAGAL <b>";
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/loginadmin.css">
	<link rel="shortcut icon" type="image/x-icon" href="../image/favicon.ico">
    <title>Admin</title>
</head>
<body>
	<div class="login-wrapper">
		<form method="POST" class="form">
			<img src="../image/logoJL.png" alt="">
			<h2>LOGIN ADMIN</h2>
			<hr><br>
			<p><?php echo isset($_COOKIE['kunjunganTerakhir'])?'Anda terakhir login pada <b>'.$_COOKIE['kunjunganTerakhir'].'</b>':''; ?></p>
			<div class="input-group">
				<input type="text" name="username" placeholder="user" value="<?php echo isset($_COOKIE['username'])?$_COOKIE['username']:''; ?>" id="loginUser">
			</div>
			<div class="input-group">
				<input type="text" name="password" placeholder="password" value="<?php echo isset($_COOKIE['password'])?$_COOKIE['password']:''; ?>" id="loginPassword">
			</div>
			
			<input class="register" type="checkbox" name="setcookie" value="true" <?php echo isset($_COOKIE['username'])?'checked':''; ?> checked>Remember Me <br>
			<input class="submit-btn" type="submit" name="submit" value="Login">
		</form>
	</div>
</body>
</html>