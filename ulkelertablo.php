<?php
session_start();
ob_start();
require "settings.php"; 
require "adminSidebar.php";
require "footer.php";
include_once 'connection.php'; 

$userID = $_SESSION["kullaniciID"];
$userType = $_SESSION["kullaniciTipi"];

if(!isset($_SESSION["kullaniciID"])) {
	header('Location: login.php');
}

if($userType != 1 and $userType != 2){
    header('Location: login.php');
}

if($userType == 2){
	$tableStyle = "text-align:center;"; 
}

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
    <title><?php echo $sitebasligi; ?></title>

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
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" style="position: fixed;">
          <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
              <a href="adminG??ncelle.php" class="site_title"><i class="fa fa-globe"></i> <span> CO2 MAP </span></a>
            </div>
            <div class="clearfix"></div>
			
           

            <div class="clearfix"></div>
            <div class = "profile clearfix">
<div class="profile_info">
  <span> HO?? GELD??N??Z!
    Admin Paneli </span> <br>
    <?php
    echo $activeUserINFO;
    ?>
</div>
</div>
<hr>


            
			<?php
			
			
					Adminsidebar();
			
			?>
           
          </div>
        </div>

        <!-- top navigation -->
		
	
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">

          <div class="row">
			
			<div class="col-md-12 col-sm-12  ">
			  
                <div class="x_panel">
                  <div class="x_title">
                    <h2>??lke Karbon De??erleri Listesi<small>Veriler anl??k olarak g??ncellenmektedir. </small></h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
		
                    <table class="table table-striped jambo_table bulk_action" id="dinamik">
					  <thead>
						<tr>
						  <th>ID</th>
						  <th>??lke Ad??</th>
						  <th>??lke Karbon De??eri</th>
              <th>Bulundu??u K??ta</th>
						  <th style="<?php echo $tableStyle; ?>">????lemler</th>
						</tr>
					  </thead>
					  				  
					  <tbody>
					  
					  <?php
					  
					  $ulkeQuery = mysqli_query($baglan,"
					  SELECT ulkeler.ulkeID,ulkeler.ulkeAdi,ulkeler.karbonDegeri,kitalar.kitaAdi
					  FROM ulkeler,kitalar
						WHERE kitalar.kitaID = ulkeler.kitaID 
					  ORDER BY ulkeler.ulkeID
					  ");
					  
					  if(mysqli_num_rows($ulkeQuery) != 0){
						  
						  while($readulke = mysqli_fetch_array($ulkeQuery)){
							  
							  $ulkeID = $readulke['ulkeID'];
							  $ulkeAdi = $readulke['ulkeAdi'];
							  $ulkekarbon=$readulke['karbonDegeri'];
                $ulkekitasi=$readulke['kitaAdi']
							  							  					  
					  ?>
					  
						<tr>
						  <td><?php echo $ulkeID; ?></td>
						  <td><?php echo $ulkeAdi; ?></td>
						  <td><?php echo $ulkekarbon; ?></td>
              <td><?php echo $ulkekitasi; ?></td>
						  
						  <td style="<?php echo $tableStyle; ?>">
							<a href='adminG??ncelle.php?ulkeID=<?php echo $ulkeID; ?>&user_id=<?php echo $userID; ?>' style='width:100px; font-size:12px;background-color:green' class='btn btn-primary btn-xs'><i class='fa fa-refresh'></i> D??zenle </a>
							<a href='ulkeSil.php?ulkeID=<?php echo $ulkeID; ?>&user_id=<?php echo $userID; ?>' style='width:100px; font-size:12px;' class='btn btn-danger btn-xs'><i class='fa fa-trash'></i> Sil </a>
						  </td>
						  
						  

						</tr>
					<?php

						}
						  
					  }
					?>					
									
					  </tbody>
					</table>
                  </div>
                </div>
              </div>

          </div>
		  
		  <br />

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

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>



    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>
	
	<script>

	$(document).ready( function () {
    $('#dinamik').DataTable();
} );

  </script>
	
  </body>
</html>
