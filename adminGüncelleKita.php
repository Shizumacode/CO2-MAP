<?php
session_start();
ob_start();
require "settings.php"; // require, include gibi belirtilen dosyayı kodun yazıldığı dosya içerisine eklemek için kullanılır. Ama include gibi uyarı vermek yerine hata verir ve kodun çalışmasını durdurur. require fonksiyonunun da kullanımı include fonksiyonu ile aynıdır.
require "adminSidebar.php";
require "footer.php";
include_once 'connection.php'; // Bu fonksiyon include fonksiyonu ile aynı şekilde çalışarak dışarıdan dosya dahil etme olanağı sağlar. Tek farkı bir dosya içerisinde aynı dosyanın birden fazla çağrılmasını engeller.

$userID = $_SESSION["kullaniciID"];

if(!isset($_SESSION["kullaniciID"])) {
	header('Location: login.php');
}

if($_SESSION["kullaniciTipi"] != 2):
    header('Location: login.php');
endif;
ob_end_flush();
$activeUserID = $_SESSION["kullaniciID"];
$activeUserINFO = $_SESSION["adsoyad"];

if (!$_SESSION["kullaniciID"] && !$_SESSION["kullaniciAdi"])
{
  session_destroy(); 
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo $favicon; ?>" type="image/ico" />

    <title><?php echo $siteBasligi; ?></title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
              <a href="adminGüncelle.php" class="site_title"><i class="fa fa-globe"></i> <span> CO2 MAP </span></a>
            </div>
            <div class="clearfix"></div>
			

<div class = "profile clearfix">
<div class="profile_info">
  <span> HOŞ GELDİNİZ!
    Admin Paneli </span> <br>
	<?php
	echo $activeUserINFO;
	?>
</div>
</div>
<hr>

            <!-- menu profile quick info -->

            <!-- /menu profile quick info -->

            

            <!-- sidebar menu -->
			<?php
			
			adminSidebar();
			
			?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->

            <!-- /menu footer buttons -->
          </div>
        </div>


        <!-- top navigation -->

        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->

          <!-- /top tiles -->

          <div class="row">
			
			<div class="col-md-8 col-sm-8  ">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Karbon Verisi Güncelleme</h2>
                    <div class="clearfix"></div>
                  </div>
					<div class="x_content">

					<?php
					$kitaID=$_GET['kitaID'];
					$yenikitaAdi=$_POST['yenikitaAdi'];
					$yenikitakarbon=$_POST['yenikarbondegeri'];


					$ulkeInfo=mysqli_query($baglan,"SELECT * FROM kitalar WHERE kitaID=$kitaID");
					$readulkeInfo = mysqli_fetch_array($ulkeInfo);
				
				if($_POST['updatekita']){ #inserturun butonuna basılırsa aşağıdaki işlemleri yap
											
					if(!$yenikitaAdi || !$yenikitakarbon ){
						echo "Lütfen boş alan bırakmayınız!<br>";
						
						echo "$yenikitaAdi<br>";
						echo "$yenikitakarbon<br>";
						
					}else{
						$updatekita = mysqli_query($baglan, "UPDATE kitalar SET kitaAdi='$yenikitaAdi',karbondegeri='$yenikitakarbon' WHERE  kitaID=$kitaID");

						if($updatekita){
							
							echo "Güncelleme Başarı ile Gerçekleşti";
							header("Refresh:1"); 
							
																							
							
						}else{
							
							echo "Güncelleme esnasında bir sorun oluştu!";
							
						}
						
					}
					
				}else{ 
					
					$kitaAdi = $readkitaInfo['kitaAdi'];
					$kitakarbon=$readkitaInfo['karbondegeri'];
	  
				}
				
				?>
						<br />
						<form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Kıta Adı
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="yenikitaAdi" required="required" class="form-control" value="<?php echo $kitaAdi; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kıta Karbon Değeri
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="yenikarbondegeri" required="required" class="form-control" value="<?php echo $kitakarbon; ?>">
								</div>
							</div>
	
							
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">	
									<button class="btn btn-dark"><a href="admindex.php" style="color:white;">Geri</a></button>
									<input type="submit" name="updatekita" class="btn btn-success" value="Güncelle" style="background-color:#2196F3"> 
								</div>
							</div>

						</form>
					</div>
                </div>
              </div>
			
          <!-- top tiles -->

          <!-- /top tiles -->

          <div class="row">
			
			<div class="col-md-8 col-sm-8  ">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Karbon Verisi Ekleme</h2>
                    <div class="clearfix"></div>
                  </div>
					<div class="x_content">

					<?php
					
					$kitaAdi=$_POST['kitaAdi'];
					$kitakarbon=$_POST['karbondegeri'];
				
				if($_POST['insertkita']){ #inserturun butonuna basılırsa aşağıdaki işlemleri yap
											
					if(!$kitaAdi || !$kitakarbon ){
						echo "Lütfen boş alan bırakmayınız!<br>";
						
						echo "$kitaAdi<br>";
						echo "$kitakarbon<br>";
						
					}else{
						$insertkita = mysqli_query($baglan, "INSERT INTO kitalar (kitaAdi, karbondegeri) 
						VALUES ('$kitaAdi','$kitakarbon')");
						if($insertkita){
							
							echo " Yeni kıta Kaydı Eklendi";
							header("Refresh:1"); 
							
																							
							
						}else{
							
							echo "Ekleme esnasında bir sorun oluştu!";
							
						}
						
					}
					
				}else{ 
					
					$kitaAdi = $readkita['kitaAdi'];
					$kitakarbon=$readkita['karbondegeri'];
	  
				}
				
				?>
					
						<br />
						<form method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name"> Kıta Adı
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="kitaAdi" required="required" class="form-control" value="<?php echo $kitaAdi; ?>">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Kıta Karbon Değeri
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="karbondegeri" required="required" class="form-control" value="<?php echo $kitakarbon; ?>">
								</div>
							</div>
							
							
							
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">	
									<button class="btn btn-dark"><a href="kitalartablo.php" style="color:white;"style="background-color:blue">Geri</a></button>
									<input type="submit" name="insertkita" class="btn btn-warning" value="Ekle" > 
								</div>
							</div>

						</form>
					</div>
                </div>
			</div>

        <!-- /page content -->

        <!-- footer content -->
		
		<?php
		
		footer();
		
		?>
		
        <!-- /footer content -->


    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>

    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.0/dist/echarts.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
	
	<script>
		$(document).ready(function() {
		$('#sektor').select2();
		});
	</script>
	
  </body>
</html>
<?php
ob_end_flush();
?>
