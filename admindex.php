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
        <div class="col-md-3 left_col"style="position: fixed;">
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
          <?php
              $queryuyesayisi = mysqli_query($baglan,"SELECT COUNT(kullanicilar.kullaniciID) AS kul_say FROM kullanicilar,kullanicitipi WHERE kullanicilar.kullaniciTipi=kullanicitipi.rolID
              AND kullanicilar.kullaniciTipi=1");
              $readQueryuyesayisi = mysqli_fetch_array($queryuyesayisi);
              $uyesayisi = $readQueryuyesayisi['kul_say'];
          ?>
        <div class="right_col" role="main" >
          <div class="">
            <div class="row" style="display: inline-block;">
            <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                   <canvas width="1000" height="100"></canvas>
                   <div class="icon"><i class="fa fa-users"></i>
                    </div>
                  <div class="count"><?php  echo $uyesayisi;  ?></div>
                  <h3> Üye Sayısı</h3>
                  <p>Kayıtlı Kullanıcılar</p>
                </div>
              </div>
            </div>
            <?php

              $queryulkesayisi = mysqli_query($baglan,"SELECT COUNT(ulkeler.ulkeID) AS ulke FROM ulkeler");
              $readQueryulkesayisi = mysqli_fetch_array($queryulkesayisi);
              $ulkesayisi = $readQueryulkesayisi['ulke'];
          ?>
            <div class="top_tiles">
              <div class="animated flipInX col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                   <canvas width="1000" height="100"></canvas>
                   <div class="icon"><i class="fa fa-flag-checkered"></i>
                    </div>
                  <div class="count"><?php  echo $ulkesayisi;  ?></div>
                  <h3> Ülke sayısı </h3>
                  <p>Kayıtlı Ülke Sayısı</p>
                </div>
              </div>
              </div>
              <?php

              $querykitasayisi = mysqli_query($baglan,"SELECT COUNT(kitalar.kitaID) AS kita FROM kitalar");
              $readQuerykitasayisi = mysqli_fetch_array($querykitasayisi);
              $kitasayisi = $readQuerykitasayisi['kita'];
              ?>
              <div class="top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 ">
                <div class="tile-stats">
                   <canvas width="1000" height="100"></canvas>
                   <div class="icon"><i class="fa fa-globe"></i>
                    </div>
                  <div class="count"><?php  echo $kitasayisi;  ?></div>
                  <h3> Kıta Sayısı</h3>
                  <p>Kayıtlı Kıta Sayısı</p>
                </div>
              </div>
              </div>
              <div class="col-md-3 col-md-3  tile_stats_count">
              <canvas width="1000" height="2"></canvas>
        <div class="x_panel">
          <span><i class="fa fa-calendar"></i> <b>&nbsp;Tarih</b></span>
          <div class="count"></div>
          <span class="count_bottom"><i class="blue"><br><h3><?php echo "Bugün " . date("d/m/Y") . "<br>"; ?></h3></i></span>
        </div>
    </div>

              
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
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
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
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
  </body>
</html>