<?php
require "settings.php";
//echo anaicon();
session_start(); // oturumu başlatıyoruz.
ob_start(); // yönlendirmelerde ihtiyacımız var. sayfa yönlendirmeleri
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
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
	<link rel="icon" href="<?php echo $favicon ?>" type="image/ico" />

    <title> <?php echo $siteBasligi; ?> </title>

	<style>
	body {
  	background-image: url('images/register1.jpg');
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
						<div align="center"> <img src="<?php echo $favicon ?>" alt="logo" height="100 px"></div>
						<br>
					</div>
					<div class="card fat" style=" background-color: rgba(255, 255, 255, 0.2);">
						<div class="card-body" style="width: 500px; height: 950px;">
						<br>
							<center><h4 class="card-title"> Hesap Oluştur </h4></center>
							<?php
							$kullaniciAdi=$_POST['kullaniciAdi'];
							$kullaniciSoyadi=$_POST['kullaniciSoyadi'];
							$email=$_POST['email'];
							$password=$_POST['password'];
							$password2 =$_POST['password2'];
							$kullaniciTipi=$_POST['kullanicitipi'];
							$ogrenimDurumu=$_POST['ogrenimDurumuID'];//sıkıntılıııııı!!!!!!
							$dogumTarihi=$_POST['dogumTarihi'];
							$telNo=$_POST['telNo'];
							$yas = date("Y") - date("Y", strtotime($dogumTarihi));
							if(isset($_POST['girisButonu'])){

							if($password !=$password2){
								echo '<div class="alert alert-danger" role="alert">
								Sifreler Uyuşmuyor.
							  </div>';
							}
							elseif(!$kullaniciAdi||!$kullaniciSoyadi||!$email||!$password||!$password2||!$kullaniciTipi||!$ogrenimDurumu||!$dogumTarihi||!$telNo){
								echo '<div class="alert alert-danger" role="alert">
								Boş Alan Bırakmayınız!!!
							  </div>';
							}
							
							elseif($password == $password2){
								$password_md5 =md5($password);
								$kullanicitipi = "1";
								$query = mysqli_query($baglan,"INSERT INTO kullanicilar (kullaniciAdi,kullaniciSoyadi,telNo,email,password,kullaniciTipi,ogrenimDurumuID,dogumTarihi,yas) VALUES ('$kullaniciAdi','$kullaniciSoyadi','$telNo','$email','$password_md5','$kullanicitipi','$ogrenimDurumu','$dogumTarihi','$yas')");
								if($query){
									echo '<div class="alert alert-success" role="alert">
									Kayıt Başarılı
								  </div>';
								  header ("Location:login.php");
								}
								else{
									echo '<div class="alert alert-danger" role="alert">
									Kayıt Başarısız.
								  </div>';
								}
							}
							
							}
							?>
							<form method="POST" class="my-login-validation" novalidate="" action= "register.php">

							<div class="form-group">
									<label for="name"> Ad </label>
									<input type="text" class="form-control" name="kullaniciAdi" value="" required autofocus>
									<div class="invalid-feedback">
										 Ad kısmı boş bırakılamaz.
									</div>
								</div>

								<div class="form-group">
									<label for="name"> Soyad </label>
									<input type="text" class="form-control" name="kullaniciSoyadi" value="" required autofocus>
									<div class="invalid-feedback">
										 Soyad kısmı boş bırakılamaz.
									</div>
								</div>

								<div class="form-group">
									<label for="name"> Doğum Tarihi </label>
									<input type="date" class="form-control" name="dogumTarihi" value="" required autofocus>
									<div class="invalid-feedback">
										 Yazılan soyad geçerli değildir.
									</div>
								</div>

								<div class="form-group">
									<label for="name"> Öğrenim Durumu </label>
									<select class="form-control" name="ogrenimDurumuID" id="ogrenimDurumuID"> 
										<option> Seçiniz...</option>
										<?php
                                        $ogrenimDurumu = 'ogrenimDurumu';
                                        $ogrenimDurumuID = 'ogrenimDurumuID';

                                        $ogrenimDurumuQuery = mysqli_query($baglan, "SELECT * from ogrenimdurumu");
										if(mysqli_num_rows($ogrenimDurumuQuery) != 0)
										{
											while($readogrenimDurumu = mysqli_fetch_array($ogrenimDurumuQuery))
											{
		                                        echo "<option value='$readogrenimDurumu[$ogrenimDurumuID]'> $readogrenimDurumu[$ogrenimDurumu] </option>";
											}
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="name"> Kullanıcı Tipi </label>
									<select class="form-control" name="kullanicitipi" id="id"> 
										<option value="" selected> Seçiniz </option>
										<option value="1" selected> Üye </option>
										
									</select>
								</div>

								<div class="form-group">
									<label for="name"> Telefon Numarası </label>
									<input type="text" class="form-control" name="telNo" value="" required autofocus>
									<div class="invalid-feedback">
									</div>
								</div>

								<div class="form-group">
									<label for="email">E-Mail</label>
									<input type="email"  type="email" class="form-control" name="email" required>
									<div class="invalid-feedback">
										Mail adresi geçersiz
									</div>
								</div>

								<div class="form-group">
									<label for="name"> Şifre</label>
									<input id="password" type="password" class="form-control" name="password" required data-eye>
									<div class="invalid-feedback">
										 Şifre gereklidir.
									</div>
								</div>

								<div class="form-group">
									<label for="name"> Şifre (Tekrar)</label>
									<input id="password" type="password" class="form-control" name="password2" required data-eye>
									<div class="invalid-feedback">
										 Şifre tekrarı gereklidir.
									</div>
								</div>
								

								<div class="form-group m-0">
									<button type="submit" name ="girisButonu" class="btn btn-primary btn-block" style="background-color: darkblue">
										Kayıt Ol
									</button>
								</div>
								<div class="mt-4 text-center">
									Zaten hesabınız var mı? <a href="login.php">Giriş Yap</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						<br>
						<p style=" color: black; text-align: center;">Telif Hakkı &copy; 2022 &mdash; CO2 MAP </p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	<script>
	$(document).ready(function()
	 {
    $('#ogrenimDurumuID').select2();
});


		</script>
</body>
</html>
