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
              <span> HO?? GELD??N??Z! </span>
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
                            <p style="font-size: 14px; color: black; align=left;"><b>Karbon emisyonu</b>, ??e??itli nedenlerden dolay?? ortaya ????kan karbonun atmosfer i??ine sal??nmas??d??r. Do??al karbondioksit emisyonu d??nyan??n i??leyi??inde ??nemli bir yere sahipken, 
                              do??al olmayan karbon ve sera gazlar??n??n sal??n??m?? ??evre i??in b??y??k zararlara neden olur. B??y??k bir ??o??unlu??u insan kaynakl?? faaliyetler sonucu meydana gelen emisyonun etkileri ve sonu??lar?? olduk??a ??nemlidir. 
                              ??zellikle sanayinin geli??mesi ve yayg??nla??mas??yla sal??n??m oran??n??n h??zl?? bir ??ekilde artmas??, insanlar?? b??y??k bir iklim sorunuyla kar???? kar????ya b??rakt??. Son y??llarda bilim insanlar??n??n ??zerinde
                              yo??un bir ??ekilde ??al????t?????? konulardan bir tanesi olan problem i??in ??e??itli ????z??m yollar?? aranmaktad??r.</p>
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
                              <h2><b>Karbon Sal??n??m?? Neden Olur?</b></h2>
                            </h2>
                            <p style="font-size: 14px; color: black;">Karbon ve di??er sera gazlar??n??n atmosfere b??y??k miktarlarda yay??lmalar??n??n ??e??itli nedenleri vard??r. Karbon sal??n??m?? nedenleri genel olarak insan faaliyetleri sonucu geli??en durumlar?? kapsar.
                              Emisyon sebepleri aras??nda en ??ok ??ne ????kanlardan bir tanesi <b>kontrols??z sanayile??medir.</b> Ayn?? zamanda <b>sera gaz?? sal??n??m??n??n kontrolden ????kmas??</b> da bu sorunun ba??l??ca nedenleri aras??nda yer al??r. 
                              <b>H??zl?? ve kontrols??z bir ??ekilde artan n??fus ve ??ehirle??me</b> de sal??n??m miktar??n?? y??kselten durumlardand??r. ??ehirle??menin ye??il alanlar?? yok etmesi sonucunda atmosferdeki karbondioksit oran?? y??kselir. 
                              Ayr??ca <b>??evreye kar???? duyarl??l??????n azalmas??</b> da karbon emisyonunun belli ba??l?? nedenlerindendir.</a>
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
                            <h2><b>Karbon Sal??n??m??n??n ??evreye Zararlar?? Nelerdir?</b></h2>
                          </h2>
                            <p style="font-size: 14px; color: black; align="left">Do??an??n i??leyi??inde ??nemli bir yere sahip olan karbondioksit gaz??n??n olmas?? gereken d??zeyden ??ok daha fazla yay??lmas?? dengenin bozulmas??na neden olur.
                              Do??an??n dengesinin bozulmas?? ise bir??ok farkl?? problemi beraberinde getirir. ??zellikle iklim ??zerinde olu??an etkinin boyutu d??nya ??zerinde ya??ayan t??m canl??lar i??in tehlike olu??turmaktad??r.
                              Karbondioksit emisyonu atmosferde as??l?? kalarak hava sirk??lasyonlar??n??n engellenmesine ve yava??lat??lmas??na yol a??ar. <b>Atmosfer ??zelliklerin bozulmas??</b> da k??resel ??s??nman??n en ??nemli etkenlerinden bir tanesidir.
                              D??nyan??n ??s??s??n??n artmas?? <b>buzullar??n erimesine</b>, <b>b??y??k ??apl?? do??al afetlere</b>, <b>hayvanlar??n neslinin t??kenmesine</b> ve <b>canl?? hayat??n??n tehlikeye girmesine</b> yol a??ar. 
                              ??evreye bir??ok a????dan zararl?? olan karbon sal??n??m??na kar???? fark??ndal??????n artmas?? ve gerekli ??nlemlerin al??nmas?? son derece ??nemlidir.</p>
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
                            <h2><b>Karbon Sal??n??m??n?? Azaltmak ????in Neler Yapabiliriz?</b></h2>
                          </h2>
                            <p style="font-size: 14px; color: black;">K??resel ??apta bir problem olan karbondioksit sal??n??m?? seviyesini azaltmak i??in uygulanabilecek ??e??itli y??ntemler mevcuttur. 
                              Emisyon oran??n??n azalt??lmas?? noktas??nda <b>s??rd??r??lebilir enerjilerin kullan??m??</b> olduk??a ??nemlidir. Peki <b>s??rd??r??lebilirlik</b> nedir? </p>
                            <p style="font-size: 14px; color: black;"><b>S??rd??r??lebilirlik</b>, ??retim ve ??e??itlili??in devam??n?? sa??layarak hayat??n daimi olmas??n??n sa??lanmas?? olarak tan??mlanabilir. 
                              Yenilenebilir enerji kaynaklar??n??n kullan??lmas?? y??ksek verim elde edilmesini sa??lar. Bu a??amada emisyonun azalmas??n?? sa??layacak enerji ??retimi y??ntemleri tercih edilmelidir. 
                              Sal??n??m?? azaltmak i??in at??labilecek ??nemli ad??mlardan bir di??eri de <b>ormanl??k alanlar??n yok edilmesinin ??n??ne ge??ilmesidir</b>. 
                              Ayr??ca fosil yak??t t??ketiminin ??nemli bir b??l??m??n?? olu??turan ula????mda <b>karbon sal??n??m??na neden olmayan enerjiler</b> kullan??lmal??d??r.</p>
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
