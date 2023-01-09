<?php
session_start();
ob_start();
require('sidebar.php');
require('footer.php');
require('settings.php');
include_once "connection.php";

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

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <?php

$ulasimQuery = mysqli_query($baglan,"SELECT sektorTurAdi, karbondegeri FROM sektortur WHERE sektorTurID = 1");
$readUlasimQuery = mysqli_fetch_array($ulasimQuery);
$ulasimco2 = $readUlasimQuery['karbondegeri'];

$sanayiQuery = mysqli_query($baglan,"SELECT sektorTurAdi, karbondegeri FROM sektortur WHERE sektorTurID = 2");
$readSanayiQuery = mysqli_fetch_array($sanayiQuery);
$sanayico2 = $readSanayiQuery['karbondegeri'];

$tarimQuery = mysqli_query($baglan,"SELECT sektorTurAdi, karbondegeri FROM sektortur WHERE sektorTurID = 3");
$readTarimQuery = mysqli_fetch_array($tarimQuery);
$tarimco2 = $readTarimQuery['karbondegeri'];

$elektrikQuery = mysqli_query($baglan,"SELECT sektorTurAdi, karbondegeri FROM sektortur WHERE sektorTurID = 4");
$readElektrikQuery = mysqli_fetch_array($elektrikQuery);
$elektrikco2 = $readElektrikQuery['karbondegeri'];

$endustriyelQuery = mysqli_query($baglan,"SELECT sektorTurAdi, karbondegeri FROM sektortur WHERE sektorTurID = 5");
$readEndustriyelQuery = mysqli_fetch_array($endustriyelQuery);
$endustriyelco2 = $readEndustriyelQuery['karbondegeri'];

$hayvancilikQuery = mysqli_query($baglan,"SELECT sektorTurAdi, karbondegeri FROM sektortur WHERE sektorTurID = 6");
$readHayvancilikQuery = mysqli_fetch_array($hayvancilikQuery);
$hayvancilikco2 = $readHayvancilikQuery['karbondegeri'];

$atikQuery = mysqli_query($baglan,"SELECT sektorTurAdi, karbondegeri FROM sektortur WHERE sektorTurID = 7");
$readAtikQuery = mysqli_fetch_array($atikQuery);
$atikco2 = $readAtikQuery['karbondegeri'];

?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.php" class="site_title"><i class="fa fa-globe"></i> <span> CO2 MAP </span></a>
            </div>

            <div class="clearfix"></div>
            <div class = "profile clearfix">
            <div class="profile_info">
              <span> HOŞ GELDİNİZ! </span>
              <?php
              echo $activeUserINFO;
              ?>
              </div>
            </div>

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
                <h3>Sektörlere Göre Karbon Emisyonu Dağılımı </h3>
                </div>
              </div>
            </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-4 col-sm-4">
                <div class="x_panel" style="width: 1250px;">
                  <div class="x_title">
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div id="chartdiv"></div>
                    </div>
                    <div id="container" style="height: 500% " style="width: 500% "></div>
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>
  <script type="text/javascript">
  
  var dom = document.getElementById('container');
  var myChart = echarts.init(dom, null, {
    renderer: 'canvas',
    useDirtyRect: false
  });
  var app = {};
  
  var option;

  option = {
title: {
  text: 'Sektörlere Göre Karbon Dağılımı',
  left: 'center'
},
tooltip: {
  trigger: 'item'
},
legend: {
  orient: 'vertical',
  left: 'left'
},
series: [
  {
    
    type: 'pie',
    radius: '50%',
  
    data: [
      { value: <?php echo $ulasimco2; ?>, name: 'Ulaşım' },
      { value: <?php echo $sanayico2; ?>, name: 'Sanayi' },
      { value: <?php echo $tarimco2; ?>, name: 'Tarım' },
      { value: <?php echo $elektrikco2; ?>, name: 'Elektrik ve Enerji' },
      { value: <?php echo $endustriyelco2; ?>, name: 'Endüstriyel' },
      { value: <?php echo $hayvancilikco2; ?>, name: 'Hayvancılık' },
      { value:  <?php echo $atikco2; ?>, name: 'Atık' }
    ],
    emphasis: {
      itemStyle: {
        shadowBlur: 10,
        shadowOffsetX: 0,
        shadowColor: 'rgba(0, 0, 0, 0.5)'
      }
    }
  }
]
};

  if (option && typeof option === 'object') {
    myChart.setOption(option);
  }

  window.addEventListener('resize', myChart.resize);

</script>
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
    </body>
</html>
    