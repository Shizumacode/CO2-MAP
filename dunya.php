<?php
session_start();
ob_start();
require('sidebar.php');
require('footer.php');
require('settings.php');
require('connection.php');
$userID = $_SESSION["kullaniciID"];
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
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">

  <?php

  $almanyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 1");
  $readAlmanyaQuery = mysqli_fetch_array($almanyaQuery);
  $almanyaco2 = $readAlmanyaQuery['karbonDegeri'];

  $turkiyeQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 2");
  $readTurkiyeQuery = mysqli_fetch_array($turkiyeQuery);
  $turkiyeco2 = $readTurkiyeQuery['karbonDegeri'];

  $rusyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 3");
  $readRusyaQuery = mysqli_fetch_array($rusyaQuery);
  $rusyaco2 = $readRusyaQuery['karbonDegeri'];

  $kolombiyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 4");
  $readKolombiyaQuery = mysqli_fetch_array($kolombiyaQuery);
  $kolombiyaco2 = $readKolombiyaQuery['karbonDegeri'];

  $brezilyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 5");
  $readBrezilyaQuery = mysqli_fetch_array($brezilyaQuery);
  $brezilyaco2 = $readBrezilyaQuery['karbonDegeri'];

  $arjantinQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 6");
  $readArjantinQuery = mysqli_fetch_array($arjantinQuery);
  $arjantinco2 = $readArjantinQuery['karbonDegeri'];

  $hindistanQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 7");
  $readHindistanQuery = mysqli_fetch_array($hindistanQuery);
  $hindistanco2 = $readHindistanQuery['karbonDegeri'];

  $cinQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 8");
  $readCinQuery = mysqli_fetch_array($cinQuery);
  $cinco2 = $readCinQuery['karbonDegeri'];

  $pakistanQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 9");
  $readPakistanQuery = mysqli_fetch_array($pakistanQuery);
  $pakistanco2 = $readPakistanQuery['karbonDegeri'];

  $amerikaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 10");
  $readAmerikaQuery = mysqli_fetch_array($amerikaQuery);
  $amerikaco2 = $readAmerikaQuery['karbonDegeri'];

  $meksikaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 11");
  $readMeksikaQuery = mysqli_fetch_array($meksikaQuery);
  $meksikaco2 = $readMeksikaQuery['karbonDegeri'];

  $nijeryaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 12");
  $readNijeryaQuery = mysqli_fetch_array($nijeryaQuery);
  $nijeryaco2 = $readNijeryaQuery['karbonDegeri'];

  $misirQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 13");
  $readMisirQuery = mysqli_fetch_array($misirQuery);
  $misirco2 = $readMisirQuery['karbonDegeri'];

  $guneyAfrikaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 14");
  $readGuneyAfrikaQuery = mysqli_fetch_array($guneyAfrikaQuery);
  $guneyAfrikaco2 = $readGuneyAfrikaQuery['karbonDegeri'];

  $avustralyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 15");
  $readAvustralyaQuery = mysqli_fetch_array($avustralyaQuery);
  $avustralyaco2 = $readAvustralyaQuery['karbonDegeri'];

  $yeniZelandaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 16");
  $readYeniZelandaQuery = mysqli_fetch_array($yeniZelandaQuery);
  $yeniZelandaco2 = $readYeniZelandaQuery['karbonDegeri'];

  $papuaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 17");
  $readPapuaQuery = mysqli_fetch_array($papuaQuery);
  $papuaco2 = $readPapuaQuery['karbonDegeri'];

  $kanadaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 18");
  $readKanadaQuery = mysqli_fetch_array($kanadaQuery);
  $kanadaco2 = $readKanadaQuery['karbonDegeri'];

  $azerbaycanQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 19");
  $readAzerbaycanQuery = mysqli_fetch_array($azerbaycanQuery);
  $azerbaycanco2 = $readAzerbaycanQuery['karbonDegeri'];

  $arabistanQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 20");
  $readArabistanQuery = mysqli_fetch_array($arabistanQuery);
  $arabistanco2 = $readArabistanQuery['karbonDegeri'];

  $guneyKoreQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 21");
  $readguneyKoreQuery = mysqli_fetch_array($guneyKoreQuery);
  $guneyKoreco2 = $readguneyKoreQuery['karbonDegeri'];

  $japonyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 22");
  $readjaponyaQuery = mysqli_fetch_array($japonyaQuery);
  $japonyaco2 = $readjaponyaQuery['karbonDegeri'];

  $endonezyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 23");
  $readendonezyaQuery = mysqli_fetch_array($endonezyaQuery);
  $endonezyaco2 = $readendonezyaQuery['karbonDegeri'];

  $italyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 24");
  $readitalyaQuery = mysqli_fetch_array($italyaQuery);
  $italyaco2 = $readitalyaQuery['karbonDegeri'];

  $fransaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 25");
  $readfransaQuery = mysqli_fetch_array($fransaQuery);
  $fransaco2 = $readfransaQuery['karbonDegeri'];

  $estonyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 26");
  $readestonyaQuery = mysqli_fetch_array($estonyaQuery);
  $estonyaco2 = $readestonyaQuery['karbonDegeri'];

  $trinidadQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 27");
  $readtrinidadQuery = mysqli_fetch_array($trinidadQuery);
  $trinidadco2 = $readtrinidadQuery['karbonDegeri'];

  $kazakistanQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 28");
  $readkazakistanQuery = mysqli_fetch_array($kazakistanQuery);
  $kazakistanco2 = $readkazakistanQuery['karbonDegeri'];

  $birlesikKrallikQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 29");
  $readbirlesikKrallikQuery = mysqli_fetch_array($birlesikKrallikQuery);
  $birlesikKrallikco2 = $readbirlesikKrallikQuery['karbonDegeri'];

  $belcikaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 30");
  $readbelcikaQuery = mysqli_fetch_array($belcikaQuery);
  $belcikaco2 = $readbelcikaQuery['karbonDegeri'];

  $finlandiyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 31");
  $readfinlandiyaQuery = mysqli_fetch_array($finlandiyaQuery);
  $finlandiyaco2 = $readfinlandiyaQuery['karbonDegeri'];

  $cekyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 32");
  $readcekyaQuery = mysqli_fetch_array($cekyaQuery);
  $cekyaco2 = $readcekyaQuery['karbonDegeri'];

  $belarusQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 33");
  $readbelarusQuery = mysqli_fetch_array($belarusQuery);
  $belarusco2 = $readbelarusQuery['karbonDegeri'];

  $ukraynaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 34");
  $readukraynaQuery = mysqli_fetch_array($ukraynaQuery);
  $ukraynaco2 = $readukraynaQuery['karbonDegeri'];

  $litvanyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 35");
  $readlitvanyaQuery = mysqli_fetch_array($litvanyaQuery);
  $litvanyaco2 = $readlitvanyaQuery['karbonDegeri'];

  $katarQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 36");
  $readkatarQuery = mysqli_fetch_array($katarQuery);
  $katarco2 = $readkatarQuery['karbonDegeri'];

  $danimarkaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 37");
  $readdanimarkaQuery = mysqli_fetch_array($danimarkaQuery);
  $danimarkaco2 = $readdanimarkaQuery['karbonDegeri'];

  $isvecQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 38");
  $readisvecQuery = mysqli_fetch_array($isvecQuery);
  $isvecco2 = $readisvecQuery['karbonDegeri'];

  $paraguayQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 39");
  $readparaguayQuery = mysqli_fetch_array($paraguayQuery);
  $paraguayco2 = $readparaguayQuery['karbonDegeri'];

  $gabonQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 40");
  $readgabonQuery = mysqli_fetch_array($gabonQuery);
  $gabonco2 = $readgabonQuery['karbonDegeri'];

  $malezyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 41");
  $readmalezyaQuery = mysqli_fetch_array($malezyaQuery);
  $malezyaco2 = $readmalezyaQuery['karbonDegeri'];

  $kongoQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 42");
  $readkongoQuery = mysqli_fetch_array($kongoQuery);
  $kongoco2 = $readkongoQuery['karbonDegeri'];

  $nikaraguaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 43");
  $readnikaraguaQuery = mysqli_fetch_array($nikaraguaQuery);
  $nikaraguaco2 = $readnikaraguaQuery['karbonDegeri'];

  $zambiyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 44");
  $readzambiyaQuery = mysqli_fetch_array($zambiyaQuery);
  $zambiyaco2 = $readzambiyaQuery['karbonDegeri'];

  $panamaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 45");
  $readpanamaQuery = mysqli_fetch_array($panamaQuery);
  $panamaco2 = $readpanamaQuery['karbonDegeri'];

  $kostaRikaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 46");
  $readkostaRikaQuery = mysqli_fetch_array($kostaRikaQuery);
  $kostaRikaco2 = $readkostaRikaQuery['karbonDegeri'];

  $bolivyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 47");
  $readbolivyaQuery = mysqli_fetch_array($bolivyaQuery);
  $bolivyaco2 = $readbolivyaQuery['karbonDegeri'];

  $yunanistanQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 48");
  $readyunanistanQuery = mysqli_fetch_array($yunanistanQuery);
  $yunanistanco2 = $readyunanistanQuery['karbonDegeri'];

  $birlesikArapQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 49");
  $readbirlesikArapQuery = mysqli_fetch_array($birlesikArapQuery);
  $birlesikArapco2 = $readbirlesikArapQuery['karbonDegeri'];

  $iranQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 50");
  $readiranQuery = mysqli_fetch_array($iranQuery);
  $iranco2 = $readiranQuery['karbonDegeri'];

  $polonyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 51");
  $readpolonyaQuery = mysqli_fetch_array($polonyaQuery);
  $polonyaco2 = $readpolonyaQuery['karbonDegeri'];

  $ispanyaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 52");
  $readispanyaQuery = mysqli_fetch_array($ispanyaQuery);
  $ispanyaco2 = $readispanyaQuery['karbonDegeri'];

  $izlandaQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 53");
  $readizlandaQuery = mysqli_fetch_array($izlandaQuery);
  $izlandaco2 = $readizlandaQuery['karbonDegeri'];

  $norvecQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 54");
  $readnorvecQuery = mysqli_fetch_array($norvecQuery);
  $norvecco2 = $readnorvecQuery['karbonDegeri'];

  $irakQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 55");
  $readirakQuery = mysqli_fetch_array($irakQuery);
  $irakco2 = $readirakQuery['karbonDegeri'];

  $kuzeyKoreQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 56");
  $readkuzeyKoreQuery = mysqli_fetch_array($kuzeyKoreQuery);
  $kuzeyKoreco2 = $readkuzeyKoreQuery['karbonDegeri'];

  $bulgaristanQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 57");
  $readbulgaristanQuery = mysqli_fetch_array($bulgaristanQuery);
  $bulgaristanco2 = $readbulgaristanQuery['karbonDegeri'];

  $kibrisQuery = mysqli_query($baglan,"SELECT ulkeAdi, karbonDegeri FROM ulkeler WHERE ulkeID = 58");
  $readkibrisQuery = mysqli_fetch_array($kibrisQuery);
  $kibrisco2 = $readkibrisQuery['karbonDegeri'];

  ?>

    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-globe"></i> <span> CO2 MAP </span></a>
            </div>

            <div class="clearfix"></div>

            <br />

            <!-- sidebar menu -->
            <?php
            sidebar();
            ?>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
          
            <!-- /menu footer buttons -->
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
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Dünya Geneli Karbon Emisyonu Değerleri</h3>
              </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div id="chartdiv"></div>
                    </div>
                        </div>
                      </div>
                    </div>
                  </div>
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
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- jQuery Sparklines -->
    <script src="../vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.usa.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- easy-pie-chart -->
    <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

    <!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<!-- Chart code -->
<script>
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
  am5themes_Animated.new(root)
]);

// Create the map chart
// https://www.amcharts.com/docs/v5/charts/map-chart/
var chart = root.container.children.push(
  am5map.MapChart.new(root, {
    panX: "rotateX",
    panY: "rotateY",
    projection: am5map.geoMercator()
  })
);

// Create series for background fill
// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
var backgroundSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));
backgroundSeries.mapPolygons.template.setAll({
  fill: root.interfaceColors.get("alternativeBackground"),
  fillOpacity: 0,
  strokeOpacity: 0
});
// Add background polygo
// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
backgroundSeries.data.push({
  geometry: am5map.getGeoRectangle(90, 180, -90, -180)
});

// Create main polygon series for countries
// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
var polygonSeries = chart.series.push(
  am5map.MapPolygonSeries.new(root, {
    geoJSON: am5geodata_worldLow
  })
);

polygonSeries.mapPolygons.template.setAll({
  fill: root.interfaceColors.get("alternativeBackground"),
  fillOpacity: 0.15,
  strokeWidth: 0.5,
  stroke: root.interfaceColors.get("background")
});

// Create polygon series for circles
// https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
var circleTemplate = am5.Template.new({
  tooltipText: "{name}: {value}"
});

var bubbleSeries = chart.series.push(
  am5map.MapPointSeries.new(root, {
    calculateAggregates: true,
    valueField: "value",
    polygonIdField: "id"
  })
);

bubbleSeries.bullets.push(function () {
  return am5.Bullet.new(root, {
    sprite: am5.Circle.new(root, {
      radius: 10,
      templateField: "circleTemplate"
    }, circleTemplate)
  });
});

bubbleSeries.set("heatRules", [{
  target: circleTemplate,
  min: 3,
  max: 30,
  key: "radius",
  dataField: "value"
}]);

var colors = am5.ColorSet.new(root, {});

bubbleSeries.data.setAll([
  {
    id: "AU",
    name: "Avustralya",
    value: <?php echo $avustralyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "AZ",
    name: "Azerbaycan",
    value: <?php echo $azerbaycanco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "BR",
    name: "Brezilya",
    value: <?php echo $brezilyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(3) }
  },
  {
    id: "CA",
    name: "Kanada",
    value: <?php echo $kanadaco2; ?>,
    circleTemplate: { fill: colors.getIndex(4) }
  },
  {
    id: "CN",
    name: "Çin",
    value: <?php echo $cinco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },
  {
    id: "EG",
    name: "Mısır",
    value: <?php echo $misirco2; ?>,
    circleTemplate: { fill: colors.getIndex(2) }
  },
  {
    id: "EE",
    name: "Estonya",
    value: <?php echo $estonyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "FR",
    name: "Fransa",
    value: <?php echo $fransaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "DE",
    name: "Almanya",
    value: <?php echo $almanyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "IN",
    name: "Hindistan",
    value: <?php echo $hindistanco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },
  {
    id: "ID",
    name: "Endonezya",
    value: <?php echo $endonezyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },
  {
    id: "IT",
    name: "İtalya",
    value: <?php echo $italyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "JP",
    name: "Japonya",
    value: <?php echo $japonyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },
  {
    id: "KR",
    name: "Güney Kore",
    value: <?php echo $guneyKoreco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },  
  {
    id: "NZ",
    name: "Yeni Zelanda",
    value: <?php echo $yeniZelandaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "NG",
    name: "Nijerya",
    value: <?php echo $nijeryaco2; ?>,
    circleTemplate: { fill: colors.getIndex(2) }
  },
  {
    id: "PK",
    name: "Pakistan",
    value: <?php echo $pakistanco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },
  {
    id: "PG",
    name: "Papua Yeni Gine",
    value: <?php echo $papuaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },  
  {
    id: "RU",
    name: "Rusya",
    value: <?php echo $rusyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "SA",
    name: "Suudi Arabistan",
    value: <?php echo $arabistanco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },
  {
    id: "ZA",
    name: "Güney Afrika",
    value: <?php echo $guneyAfrikaco2; ?>,
    circleTemplate: { fill: colors.getIndex(2) }
  },
  {
    id: "ES",
    name: "İspanya",
    value: <?php echo $ispanyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "SE",
    name: "İsveç",
    value: <?php echo $isvecco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "TT",
    name: "Trinidad ve Tobago",
    value: <?php echo $trinidadco2; ?>,
    circleTemplate: { fill: colors.getIndex(4) }
  },
  {
    id: "TR",
    name: "Türkiye",
    value: <?php echo $turkiyeco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "UA",
    name: "Ukrayna",
    value: <?php echo $ukraynaco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "AE",
    name: "Birleşik Arap Emirlikleri",
    value: <?php echo $birlesikArapco2; ?>,
    circleTemplate: { fill: colors.getIndex(0) }
  },
  {
    id: "GB",
    name: "Birleşik Krallık",
    value: <?php echo $birlesikKrallikco2; ?>,
    circleTemplate: { fill: colors.getIndex(8) }
  },
  {
    id: "US",
    name: "Amerika Birleşik Devletleri",
    value: <?php echo $amerikaco2; ?>,
    circleTemplate: { fill: colors.getIndex(4) }
  },
  {
    id: "ZM",
    name: "Zambiya",
    value: <?php echo $zambiyaco2; ?>,
    circleTemplate: { fill: colors.getIndex(2) }
  },
]);

// Add globe/map switch
var cont = chart.children.push(am5.Container.new(root, {
  layout: root.horizontalLayout,
  x: 20,
  y: 40
}));

cont.children.push(am5.Label.new(root, {
  centerY: am5.p50,
  text: "Map"
}));

var switchButton = cont.children.push(
  am5.Button.new(root, {
    themeTags: ["switch"],
    centerY: am5.p50,
    icon: am5.Circle.new(root, {
      themeTags: ["icon"]
    })
  })
);

switchButton.on("active", function () {
  if (!switchButton.get("active")) {
    chart.set("projection", am5map.geoMercator());
    backgroundSeries.mapPolygons.template.set("fillOpacity", 0);
  } else {
    chart.set("projection", am5map.geoOrthographic());
    backgroundSeries.mapPolygons.template.set("fillOpacity", 0.1);
  }
});

cont.children.push(
  am5.Label.new(root, {
    centerY: am5.p50,
    text: "Globe"
  })
);

// Make stuff animate on load
chart.appear(1000, 100);

}); // end am5.ready()
</script>
	
  </body>
</html>