<?php
include "database/koneksi.php";



?>

<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  
    <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  
  <script src="bower_components/jquery/dist/jquery.min.js"></script> 
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  
  <!-- TABLE STYLES-->
    <link href="dataTables/dataTables.bootstrap.css" rel="stylesheet" />
  
 
  <style>
    /* Remove the navbar's default rounded borders and increase the bottom margin */ 
    .navbar {
      margin-bottom: 50px;
      border-radius: 0;
    }
    
    /* Remove the jumbotron's default bottom margin */ 
     .jumbotron {
      margin-bottom: 0;
	  background-color: white;
	  margin-top: px;
    }
   
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #000000;
      padding: 10px;
    }
	
	 img{
		 margin-left: 20px;
		 margin-top: -20px;
		 margin-bottom: -20px;
		float : left;
	}
	
	body {
    background-image: url("img/logo/keren.jpg");
    }
	
	.well{
	 background-image: url("img/logo/keren.jpg");
	}

	
  </style>
</head>
<body>

<div class="jumbotron">
	<img src="img/logo/logo.jpg" alt="logo" width="150">
  <div class="container text-center">
    <h2 style="color: blue;">SISTEM INFORMASI NILAI RAPORT SMA NEGERI 2 DOGIYAI</h2>      
	<p style="color: blue;">Jln. Trans Papua Nabire-Enarotali Km. 184</p>
  </div>
</div>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="?page=info">Home</a></li>
        <li><a href="?page=jadwal">Jadwal</a></li>
        <li><a href="?page=materi">Materi Pelajaran</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="log/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <div class="row">
  
    <?php
					
					$page = $_GET["page"];
					$aksi = $_GET["aksi"];
					
					if ($page == "info") {
						if ($aksi == "") {
							include "home/info/info.php";
						}
					}
					
					if ($page == "jadwal") {
						if ($aksi == "") {
							include "home/jadwal/jadwal.php";
						}elseif ($aksi == "lihat") {
							include "data/data_japel/lihat.php";
						}
					}
					
					if ($page == "materi") {
						if ($aksi == "") {
							include "home/materi/materi.php";
						}elseif ($aksi == "lihat") {
							include "data/data_japel/lihat.php";
						}
					}
	
	?>
	

  </div>
</div><br><br>

<footer class="container-fluid text-center">
  <p>SMA NEGERI 2 DOGIYAI</p>
</footer>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="bower_components/chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

<!-- DATA TABLE SCRIPTS -->
    <script src="dataTables/jquery.dataTables.js"></script>
    <script src="dataTables/dataTables.bootstrap.js"></script>
	
	
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>

</body>
</html>
