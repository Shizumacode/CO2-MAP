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
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">

  <?php
  $avrupaQuery = mysqli_query($baglan,"SELECT kitaAdi, karbondegeri FROM kitalar WHERE kitaID = 1");
  $readavrupaQuery = mysqli_fetch_array($avrupaQuery);
  $avrupaco2 = $readavrupaQuery['karbondegeri'];

  $guneyAmerikaQuery = mysqli_query($baglan,"SELECT kitaAdi, karbondegeri FROM kitalar WHERE kitaID = 2");
  $readguneyAmerikaQuery = mysqli_fetch_array($guneyAmerikaQuery);
  $guneyAmerikaco2 = $readguneyAmerikaQuery['karbondegeri'];

  $asyaQuery = mysqli_query($baglan,"SELECT kitaAdi, karbondegeri FROM kitalar WHERE kitaID = 3");
  $readasyaQuery = mysqli_fetch_array($asyaQuery);
  $asyaco2 = $readasyaQuery['karbondegeri'];

  $kuzeyAmerikaQuery = mysqli_query($baglan,"SELECT kitaAdi, karbondegeri FROM kitalar WHERE kitaID = 4");
  $readkuzeyAmerikaQuery = mysqli_fetch_array($kuzeyAmerikaQuery);
  $kuzeyAmerikaco2 = $readkuzeyAmerikaQuery['karbondegeri'];

  $afrikaQuery = mysqli_query($baglan,"SELECT kitaAdi, karbondegeri FROM kitalar WHERE kitaID = 5");
  $readafrikaQuery = mysqli_fetch_array($afrikaQuery);
  $afrikaco2 = $readafrikaQuery['karbondegeri'];

  $avustralyaQuery = mysqli_query($baglan,"SELECT kitaAdi, karbondegeri FROM kitalar WHERE kitaID = 6");
  $readavustralyaQuery = mysqli_fetch_array($avustralyaQuery);
  $avustralyaco2 = $readavustralyaQuery['karbondegeri'];

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
            <div class = "profile clearfix">
            <div class="profile_info">
              <span> HOŞ GELDİNİZ! </span>
              <?php
              echo $activeUserINFO;
              ?>
</div>
</div>
<hr>

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
                <h3> Kıtaların Karbon Emisyonu Değerleri (%)</h3>
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
                  <center><canvas id="container" width="1000" height="495"></canvas></center>
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
    <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/extension/dataTool.min.js"></script>
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts-gl@2/dist/echarts-gl.min.js"></script>
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts-stat@latest/dist/ecStat.min.js"></script>
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@4.9.0/map/js/china.js"></script>
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@4.9.0/map/js/world.js"></script>
  <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/extension/bmap.min.js"></script>
  
<!-- Resources -->

<!-- Chart code -->

<script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
    <script type="text/javascript" src="https://fastly.jsdelivr.net/npm/echarts@5.4.1/dist/echarts.min.js"></script>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
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
  xAxis: {
    type: 'category',
    data: ['Avrupa', 'Güney Amerika', 'Asya', 'Kuzey Amerika', 'Afrika', 'Avustralya']
  },
  yAxis: {
    type: 'value'
  },
  series: [
    {
      data: [<?php echo $avrupaco2;?>, <?php echo $guneyAmerikaco2;?>, <?php echo $asyaco2;?>, <?php echo $kuzeyAmerikaco2;?>, <?php echo $afrikaco2;?>, <?php echo $avustralyaco2;?>],
      type: 'bar',
      showBackground: true,
      backgroundStyle: {
        color: 'rgba(180, 180, 180, 0.2)'
      }
    }
  ]
};


    if (option && typeof option === 'object') {
      myChart.setOption(option);
    }

    window.addEventListener('resize', myChart.resize);
  </script>
	
  </body>
</html>