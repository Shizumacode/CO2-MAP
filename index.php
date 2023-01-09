<?php
session_start();
ob_start();
require('sidebar.php');
require('footer.php');
require('settings.php');
include_once "connection.php";

$_SESSION["kullaniciID"];
if(!isset($_SESSION["kullaniciID"])) {
	header('Location: login.php');
}

if($_SESSION["kullaniciTipi"] != 1):
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
    <meta name="viewport" content="width=device-width, initial-scale=1"height="1 px">
	  <link rel="icon" href="<?php echo $favicon ?>" type="image/ico" />

    <title> <?php echo $siteBasligi; ?> </title>

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
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-globe"></i> <span> CO2 MAP </span></a>
            </div>
            <div class="clearfix"></div>
            <br />

            <div class = "profile clearfix">
            <div class="profile_info">
              <span> HOŞ GELDİNİZ! </span>
              <?php
              echo $activeUserINFO;
              ?>
              <?php
              //navigasyon();
              ?>
              
            </div>
            </div>

            <!-- sidebar menu -->
            <?php
            sidebar();
            ?>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
                <br>
              <ul class=" navbar-right">
              <p style="font-size: 22px;"> <?php echo $siteBasligi ?> </p>
            </nav>
                </div>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <br>
        <br>
        <div class="right_col" role="main">

          <!-- top tiles -->
          <div class="row" style="display: inline-block;" >
          <div class="tile_count">
        </div>

        <div class="row">
            <div >
              <div class="x_panel">
                <div class="x_title">
                  
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="dashboard-widget-content">

                    <ul class="list-unstyled timeline widget">
                      <li>
                      <img src="images/karbon1.jpg" height="270" width="470" align ="right" style="float: right; padding:0 0 15px 15px;"/>
                        <div class="block" >
                          <div class="block_content">
                          <h2 class="title">
                            <h2><b>Karbon Emisyonu Nedir?</b></h2>
                          </h2>
                            <p style="font-size: 14px; color: black; align=left;"><b>Karbon emisyonu</b>, çeşitli nedenlerden dolayı ortaya çıkan karbonun atmosfer içine salınmasıdır. Doğal karbondioksit emisyonu dünyanın işleyişinde önemli bir yere sahipken, 
                              doğal olmayan karbon ve sera gazlarının salınımı çevre için büyük zararlara neden olur. Büyük bir çoğunluğu insan kaynaklı faaliyetler sonucu meydana gelen emisyonun etkileri ve sonuçları oldukça önemlidir. 
                              Özellikle sanayinin gelişmesi ve yaygınlaşmasıyla salınım oranının hızlı bir şekilde artması, insanları büyük bir iklim sorunuyla karşı karşıya bıraktı. Son yıllarda bilim insanlarının üzerinde
                              yoğun bir şekilde çalıştığı konulardan bir tanesi olan problem için çeşitli çözüm yolları aranmaktadır.</p>
                            <br>
                            <br>
                            <br>
                            <br>
                          </div>
                        </div>
                      </li>
                      <br>
                      <li>
                      <img src="images/karbon4.jpg" height="270" width="470" align ="right" style="float: right; padding:0 0 15px 15px;" />
                        <div class="block">
                          <div class="block_content">
                          <h2 class="title">
                              <h2><b>Karbon Salınımı Neden Olur?</b></h2>
                            </h2>
                            <p style="font-size: 14px; color: black;">Karbon ve diğer sera gazlarının atmosfere büyük miktarlarda yayılmalarının çeşitli nedenleri vardır. Karbon salınımı nedenleri genel olarak insan faaliyetleri sonucu gelişen durumları kapsar.
                              Emisyon sebepleri arasında en çok öne çıkanlardan bir tanesi <b>kontrolsüz sanayileşmedir.</b> Aynı zamanda <b>sera gazı salınımının kontrolden çıkması</b> da bu sorunun başlıca nedenleri arasında yer alır. 
                              <b>Hızlı ve kontrolsüz bir şekilde artan nüfus ve şehirleşme</b> de salınım miktarını yükselten durumlardandır. Şehirleşmenin yeşil alanları yok etmesi sonucunda atmosferdeki karbondioksit oranı yükselir. 
                              Ayrıca <b>çevreye karşı duyarlılığın azalması</b> da karbon emisyonunun belli başlı nedenlerindendir.</a>
                            </p>
                          <br>
                          <br>
                          <br>
                          <br>
                          </div>
                        </div>
                      </li>
                      <br>
                      <li>
                      <img src="images/karbon2.jpeg" height="270" width="470" align ="right" style="float: right; padding:0 0 15px 15px;" />
                        <div class="block">
                          <div class="block_content">
                          <h2 class="title">
                            <h2><b>Karbon Salınımının Çevreye Zararları Nelerdir?</b></h2>
                          </h2>
                            <p style="font-size: 14px; color: black; align="left">Doğanın işleyişinde önemli bir yere sahip olan karbondioksit gazının olması gereken düzeyden çok daha fazla yayılması dengenin bozulmasına neden olur.
                              Doğanın dengesinin bozulması ise birçok farklı problemi beraberinde getirir. Özellikle iklim üzerinde oluşan etkinin boyutu dünya üzerinde yaşayan tüm canlılar için tehlike oluşturmaktadır.
                              Karbondioksit emisyonu atmosferde asılı kalarak hava sirkülasyonlarının engellenmesine ve yavaşlatılmasına yol açar. <b>Atmosfer özelliklerin bozulması</b> da küresel ısınmanın en önemli etkenlerinden bir tanesidir.
                              Dünyanın ısısının artması <b>buzulların erimesine</b>, <b>büyük çaplı doğal afetlere</b>, <b>hayvanların neslinin tükenmesine</b> ve <b>canlı hayatının tehlikeye girmesine</b> yol açar. 
                              Çevreye birçok açıdan zararlı olan karbon salınımına karşı farkındalığın artması ve gerekli önlemlerin alınması son derece önemlidir.</p>
                            <br>
                            <br>
                          </div>
                        </div>
                      </li>
                      <br>
                      <li>
                      <img src="images/karbon3.jpg" height="270" width="470" align ="right" style="float: right; padding:0 0 15px 15px;" />
                      <div class="block">
                          <div class="block_content">
                          <h2 class="title">
                            <h2><b>Karbon Salınımını Azaltmak İçin Neler Yapabiliriz?</b></h2>
                          </h2>
                            <p style="font-size: 14px; color: black;">Küresel çapta bir problem olan karbondioksit salınımı seviyesini azaltmak için uygulanabilecek çeşitli yöntemler mevcuttur. 
                              Emisyon oranının azaltılması noktasında <b>sürdürülebilir enerjilerin kullanımı</b> oldukça önemlidir. Peki <b>sürdürülebilirlik</b> nedir? </p>
                            <p style="font-size: 14px; color: black;"><b>Sürdürülebilirlik</b>, üretim ve çeşitliliğin devamını sağlayarak hayatın daimi olmasının sağlanması olarak tanımlanabilir. 
                              Yenilenebilir enerji kaynaklarının kullanılması yüksek verim elde edilmesini sağlar. Bu aşamada emisyonun azalmasını sağlayacak enerji üretimi yöntemleri tercih edilmelidir. 
                              Salınımı azaltmak için atılabilecek önemli adımlardan bir diğeri de <b>ormanlık alanların yok edilmesinin önüne geçilmesidir</b>. 
                              Ayrıca fosil yakıt tüketiminin önemli bir bölümünü oluşturan ulaşımda <b>karbon salınımına neden olmayan enerjiler</b> kullanılmalıdır.</p>
                            <br>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
 
                <?php
               ## $queryKadin = mysqli_query($baglan, "SELECT COUNT(kullanicilar.kullaniciID) AS kadin_sayisi FROM kullanicilar");
               ## $readqueryKadin = mysqli_fetch_array($query);
               ## $kadin_sayisi = $readQueryKadin['kadin_sayisi'];
                ?> 

               
                <!-- end of weather widget -->
              </div>
            </div>
        </div>
        

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

  </body>
</html>
