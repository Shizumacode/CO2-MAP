<?php
require "settings.php"; 
//echo anaicon();
session_start(); // Oturum başlatma
ob_start(); // Sayfa yönlendirmeleri
include_once 'connection.php'; // Bu fonksiyon include fonksiyonu ile aynı şekilde çalışarak dışarıdan dosya dahil etme olanağı sağlar. Tek farkı bir dosya içerisinde aynı dosyanın birden fazla çağrılmasını engeller.
//name ile text'lerden veri çekme


?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
	<link rel="icon" href="<?php echo $favicon ?>" type="image/ico" />

    <title> <?php echo $siteBasligi; ?> </title>

	<style>
	body {
  	background-image: url('images/background.jpg');
  	background-repeat: no-repeat;
  	background-attachment: fixed;
  	background-size: 100% 100%;
	}
	</style>

</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<br>
						<br>
						<div align="center"> <img src="<?php echo $favicon ?>" alt="logo" height="100 px"></div>
						<br>
					</div>
					<div class="card fat" style=" background-color: rgba(255, 255, 255, 0.2);">
						<div class="card-body" style="width: 390px; height: 475px;">
						<br>
						<?php
						if(isset($_POST['girisButonu'])){ // isset, parametre olarak aldığı değişkenin tanımlı olup olmadığını kontrol eder.
		
		$email = $_POST['email'];
		$pass = $_POST['password'];
		$passmd5=md5($pass);
		if(!$email||!$pass){
			echo '<div class="alert alert-danger" role="alert">
			Boş Alan Bırakmayınız!!!
		  </div>';
		}
		elseif($email && $passmd5){
	
			$query = mysqli_query($baglan, "SELECT * FROM kullanicilar WHERE email='$email' AND password='$passmd5'");
			$numrow = mysqli_num_rows($query);
			
			if($numrow > 0){
	
				$query = mysqli_query($baglan, "SELECT * ,CONCAT(kullanicilar.kullaniciAdi,' ',kullanicilar.kullaniciSoyadi)AS adsoyad FROM kullanicilar WHERE email='$email' AND password='$passmd5'");
				$row = mysqli_fetch_array($query);
	
				$_SESSION["email"] = $row["email"]; // Sessionlar oturum bilgilerini saklamak için kullanılan yapılardır.
				$_SESSION["kullaniciID"] = $row["kullaniciID"];
				$_SESSION["kullaniciTipi"] = $row["kullaniciTipi"];
				$_SESSION["adsoyad"] = $row["adsoyad"];
				$_SESSION["first_login"] = "first"; // log kaydı için kenarda dursun
	
				if ($row['kullaniciTipi'] == 1){
					header('Location:index.php');
					echo "aldi";
				}elseif ($row['kullaniciTipi'] == 2){
					header('Location:admindex.php');
				}else{
					exit("User Group Id Bulunamadı");
					
				}
	
			}else{
	
				echo "<script type='text/javascript'>
				window.location='login.php?user=false';
				</script>";
	
			}
		}
	}
	?>
							<center><h4 class="card-title"> Giriş Formu </h4></center>
							<form method="POST" class="my-login-validation" novalidate="" action= "login.php">
								<div class="form-group">
									<label for="email">E-Posta</label>
									<input type="email" class="form-control" name="email" value="" required autofocus>
									<div class="invalid-feedback">
										 Yazılan e-posta adresi geçerli değildir.
									</div>
								</div>

								<div class="form-group">
									<label for="password"> Şifre
									</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
									şifre Kısmı gerekli Bir alandır
									</div>
								</div>
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Beni Hatırla</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name ="girisButonu" class="btn btn-primary btn-block" style="background-color: orangered">
										Giriş Yap
									</button>
								</div>
								<div class="mt-4 text-center">
									Hesabınız mı yok? <a href="register.php">Hesap Oluştur</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						<br>
						<p style=" color: white; text-align: center;">Telif Hakkı &copy; 2022 &mdash; CO2 MAP </p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
