<?php
require "settings.php";
//echo anaicon();
require "connection.php";
session_start(); // oturumu başlatıyoruz.
ob_start(); // yönlendirmelerde ihtiyacımız var. sayfa yönlendirmeleri
include_once 'connection.php'; // Bu fonksiyon include fonksiyonu ile aynı şekilde çalışarak dışarıdan dosya dahil etme olanağı sağlar. Tek farkı bir dosya içerisinde aynı dosyanın birden fazla çağrılmasını engeller.
//name ile text'lerden veri çekme

if(isset($_POST['girisButonu'])){ // isset, parametre olarak aldığı değişkenin tanımlı olup olmadığını kontrol eder.
	
	$ad=$_POST['ad'];
	$soyad=$_POST['soyad'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$kullaniciTipi=2;
	$giris=mysqli_query($baglan,"INSERT INTO kullanicilar (kullaniciAdi,kullaniciSoyadi,email,password,kullaniciTipi) VALUES ('$ad','$soyad','$email','$pass','$kullaniciTipi')");

	if($ad==null){
		echo "Kullanıcı Adı Boş Bırakılamaz";
	}
	else if(!$pass){
		echo "Şifre Boş Bırakılamaz";
	}
	else if($giris){
		echo "Başarılı ile Kayıt Oldunuz.";
		header('Location:index.php');
	  
	}else{
		
		echo "Kayıt olurken Hata oluştu.Tekrar Bilgilerinizi Kontrol Ediniz.";
	  
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="images/resim.png "/>
	<title> Kayıt Ekranı </title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
    
</head>

<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<div class="brand">
						<div align="center"> <img src="images/co2.png" alt="logo" height="100 px"></div>
						<br>
					</div>
					<div class="card fat" >
						<div class="card-body">
							<h4 class="card-title">Kayıt Formu</h4>
							<form method="POST" class="my-login-validation" novalidate="" action= "login.php">
                            <div class="form-group">
									<label for="isim">Ad</label>
									<input type="isim" class="form-control" name="ad" value="" required autofocus>
                                </div>

                                <div class="form-group">
									<label for="">Soyad</label>
									<input type="" class="form-control" name="soyad" value="" required autofocus >
                                </div>
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
								</div>
								<div class="form-group">
									<div class="custom-checkbox custom-control">
										<input type="checkbox" name="remember" id="remember" class="custom-control-input">
										<label for="remember" class="custom-control-label">Beni Hatırla</label>
									</div>
								</div>

								<div class="form-group m-0">
									<button type="submit" name ="girisButonu" class="btn btn-primary btn-block">
										Kayıt Ol
									</button>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						<br>
						Telif Hakkı &copy; 2022 &mdash; CO2 Map 
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