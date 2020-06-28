<?php
include "database/koneksi.php";
  
session_start();

if( !isset($_SESSION["Login"]) ) {
	header("Location:  sekolah.php?page=info");
	exit;
}

?>


<?php error_reporting(E_ALL ^ (E_NOTICE | E_WARNING)); ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
    <!-- TABLE STYLES-->
    <link href="dataTables/dataTables.bootstrap.css" rel="stylesheet" />


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
		
		
		
		<script src="js/jquery-3.4.1.min.js"></script>
			        <script>
					
			
					$(document).ready(function() {
						$('#kelas1').change(function() {
							var kelas1_id = $(this).val();
							
						$.ajax({
							type: 'POST',
							url: 'data/data_nilai/sis.php',
							data: 'id_kelas='+kelas1_id,
							success: function(response) {
							$('#siswa1').html(response);
							}	

						});
					})
				});

                </script>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>SINS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SINS</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
         
        
            

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
	  <?php
if ($_SESSION['Admin']){
		$user1 = $_SESSION['Admin'];
	}elseif ($_SESSION['guru']){
		$user2 = $_SESSION['guru'];
	}elseif ($_SESSION['walikelas']){
		$user2 = $_SESSION['walikelas'];
	}elseif ($_SESSION['siswa']){
		$user3 = $_SESSION['siswa'];
	}

	$result1 = mysqli_query($conn,"SELECT * FROM tb_staf WHERE nik = '$user1'");
	
	$admin = mysqli_fetch_array($result1);
	
	$result2 = mysqli_query($conn,"SELECT * FROM tb_guru WHERE nip = '$user2'");
	
	$guru = mysqli_fetch_array($result2);
	
	$result3 = mysqli_query($conn,"SELECT * FROM tb_siswa WHERE nis = '$user3'");
	
	$siswa = mysqli_fetch_array($result3);
	
	

?>
	
	
	
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      	<?php
				// jika data yang di terima data 
		if( mysqli_num_rows($result1) > 0 ) {
		echo'<div class="user-panel">
				<div class="pull-left image">
          <img src="img/foto/staf/'. $admin["foto"] .'" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>'.  $admin['nama_staf'] .' </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i>'.  $admin['level'] .'</a>
        </div>
				</div>';}
		elseif( mysqli_num_rows($result2) > 0 ) {
		echo'<div class="user-panel">
				<div class="pull-left image">
          <img src="img/foto/guru/'. $guru["foto"] .'" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>'.  $guru['nama_guru'] .' </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i>'.Guru.'</a>
        </div>
				</div>';}
		elseif( mysqli_num_rows($result3) > 0 ) {
		echo'<div class="user-panel">
				<div class="pull-left image">
          <img src="img/foto/siswa/'. $siswa["foto"] .'" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>'.  $siswa['nama_siswa'] .' </p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i>'.Siswa.'</a>
        </div>
				</div>';}		
		
		?>


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
		<?php 
		$masuk1 = $_SESSION['Admin'];
		if($masuk1){ echo
		'<li><a href="?page=pengumuman"><i class="fa fa-table"></i> <span>Data Pengumuman</span></a></li>
        <li><a href="?page=siswa"><i class="fa fa-table"></i> <span>Data Siswa</span></a></li>
		<li><a href="?page=guru"><i class="fa fa-table"></i> <span>Data Guru</span></a></li>
		<li><a href="?page=wakel"><i class="fa fa-table"></i> <span>Data Wali Kelas</span></a></li>
		<li><a href="?page=staf"><i class="fa fa-table"></i> <span>Data Staf</span></a></li>
		
		 <li class="treeview menu">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Data Akademik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		<li><a href="?page=kelas"><i class="fa fa-circle-o"></i> <span>Data Kelas</span></a></li>
		<li><a href="?page=thnajar"><i class="fa fa-circle-o"></i> <span>Data Tahun Ajaran</span></a></li>
		<li><a href="?page=mapel"><i class="fa fa-circle-o"></i> <span>Data Mata Pelajaran</span></a></li>
		<li><a href="?page=japel"><i class="fa fa-circle-o"></i> <span>Data Jadwal Pelajaran</span></a></li>
		<li><a href="?page=kelsis"><i class="fa fa-circle-o"></i> <span>Data Kelas Siswa</span></a></li>
		</ul>
        </li>

		
		 <li class="treeview menu">
          <a href="#">
            <i class="fa fa-book"></i> <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?page=l_siswa"><i class="fa fa-circle-o"></i>Laporan Data Siswa</a></li>
            <li><a href="?page=l_guru"><i class="fa fa-circle-o"></i>Laporan Data Guru</a></li>
			<li><a href="?page=l_staf"><i class="fa fa-circle-o"></i>Laporan Data Staf</a></li>
			<li><a href="?page=l_kelsis"><i class="fa fa-circle-o"></i>Laporan Data Kelas siswa</a></li>
			<li><a href="?page=l_nilai"><i class="fa fa-circle-o"></i>Laporan Data Nilai Siswa</a></li>
          </ul>
        </li>
		<li><a href="log/logout.php"><i class="fa fa-link"></i> <span>Log Out</span></a></li>';}
		
		
		$masuk2 = $_SESSION['guru'];
		if($masuk2){ echo
		'<li><a href="?page=materi"><i class="fa fa-table"></i> <span>Data Materi pelajaran</span></a></li>
		
		 <li class="treeview menu">
          <a href="#">
            <i class="fa fa-laptop"></i> <span>Nilai Siswa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
		<li><a href="?page=nilai"><i class="fa fa-circle-o"></i> <span>Input Nilai Siswa</span></a></li>
		<li><a href="?page=nilai&aksi=lihat2"><i class="fa fa-circle-o"></i> <span>Lihat Nilai Siswa</span></a></li>
		</ul>
        </li>
	
		<li><a href="log/logout.php"><i class="fa fa-link"></i> <span>Log Out</span></a></li>';}
		
		$masuk2 = $_SESSION['walikelas'];
		if($masuk2){ echo
		'<li><a href="?page=nilai&aksi=lihat"><i class="fa fa-laptop"></i> <span>Nilai Raport</span></a></li>
	
		<li><a href="log/logout.php"><i class="fa fa-link"></i> <span>Log Out</span></a></li>';}
		
		
		$masuk3 = $_SESSION['siswa'];
		if($masuk3){ echo
		'<li><a href="?page=raport"><i class="fa fa-table"></i> <span>Nilai Raport</span></a></li>
		<li><a href="log/logout.php"><i class="fa fa-link"></i> <span>Log Out</span></a></li>';}
		
		?>
      
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
		 <section class="content-header">
		<?php
					
					$page = $_GET["page"];
					$aksi = $_GET["aksi"];
					
					if ($page == "pengumuman") {
						if ($aksi == "") {
							include "data/data_pengumuman/pengumuman.php";
						}elseif ($aksi == "tambah"){
							include "data/data_pengumuman/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_pengumuman/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_pengumuman/ubah.php";
						}
					}
					
					if ($page == "siswa") {
						if ($aksi == "") {
							include "data/data_siswa/siswa.php";
						}elseif ($aksi == "tambah"){
							include "data/data_siswa/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_siswa/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_siswa/ubah.php";
						}
					}
					
					if ($page == "guru") {
						if ($aksi == "") {
							include "data/data_guru/guru.php";
						}elseif ($aksi == "tambah"){
							include "data/data_guru/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_guru/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_guru/ubah.php";
						}
					}
					
					if ($page == "wakel") {
						if ($aksi == "") {
							include "data/data_wakel/wakel.php";
						}elseif ($aksi == "tambah"){
							include "data/data_wakel/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_wakel/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_wakel/ubah.php";
						}
					}
					
					if ($page == "staf") {
						if ($aksi == "") {
							include "data/data_staf/staf.php";
						}elseif ($aksi == "tambah"){
							include "data/data_staf/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_staf/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_staf/ubah.php";
						}
					}
					
					if ($page == "kelas") {
						if ($aksi == "") {
							include "data/data_kelas/kelas.php";
						}elseif ($aksi == "tambah"){
							include "data/data_kelas/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_kelas/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_kelas/ubah.php";
						}
					}
					
					if ($page == "thnajar") {
						if ($aksi == "") {
							include "data/data_thnajar/thnajar.php";
						}elseif ($aksi == "tambah"){
							include "data/data_thnajar/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_thnajar/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_thnajar/ubah.php";
						}
					}
					
					if ($page == "mapel") {
						if ($aksi == "") {
							include "data/data_mapel/mapel.php";
						}elseif ($aksi == "tambah"){
							include "data/data_mapel/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_mapel/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_mapel/ubah.php";
						}
					}
					
					if ($page == "japel") {
						if ($aksi == "") {
							include "data/data_japel/japel.php";
						}elseif ($aksi == "tambah"){
							include "data/data_japel/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_japel/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_japel/ubah.php";
						}elseif ($aksi == "lihat") {
							include "data/data_japel/lihat.php";
						}
					}
					
					
					if ($page == "kelsis") {
						if ($aksi == "") {
							include "data/data_kelsis/kelsis.php";
						}elseif ($aksi == "tambah"){
							include "data/data_kelsis/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_kelsis/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_kelsis/ubah.php";
						}
					}
					
					if ($page == "user") {
						if ($aksi == "") {
							include "data/data_user/user.php";
						}elseif ($aksi == "tambah"){
							include "data/data_user/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_user/hapus.php";
						}elseif ($aksi == "ubah") {
							include "data/data_user/ubah.php";
						}
					}
					
					if ($page == "nilai") {
						if ($aksi == "") {
							include "data/data_nilai/nilai.php";
						}elseif ($aksi == "lihat") {
							include "data/data_nilai/lihat.php";
						}elseif ($aksi == "tambah") {
							include "data/data_nilai/tambah.php";
						}elseif ($aksi == "lihat2") {
							include "data/data_nilai/lihat2.php";
						}elseif ($aksi == "ubah") {
							include "data/data_nilai/ubah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_nilai/hapus.php";
						}elseif ($aksi == "ubah2") {
							include "data/data_nilai/ubah2.php";
						}
					}
					
					
					if ($page == "materi") {
						if ($aksi == "") {
							include "data/data_materi/materi.php";
						}elseif ($aksi == "tambah"){
							include "data/data_materi/tambah.php";
						}elseif ($aksi == "hapus") {
							include "data/data_materi/hapus.php";
						}elseif ($aksi == "lihat") {
							include "data/data_materi/lihat.php";
						}
					}
					
					if ($page == "raport") {
						if ($aksi == "") {
							include "data/data_raport/raport.php";
						}elseif ($aksi == "tambah"){
							include "data/data_materi/tambah.php";
						}
					}
					
					if ($page == "l_siswa") {
						if ($aksi == "") {
							include "data/Laporan/l_siswa.php";
						}
					}
					
					if ($page == "l_guru") {
						if ($aksi == "") {
							include "data/Laporan/l_guru.php";
						}
					}
					
					if ($page == "l_staf") {
						if ($aksi == "") {
							include "data/Laporan/l_staf.php";
						}
					}
					
					if ($page == "l_kelsis") {
						if ($aksi == "") {
							include "data/Laporan/l_kelsis.php";
						}
					}
					
					if ($page == "l_nilai") {
						if ($aksi == "") {
							include "data/Laporan/l_nilai.php";
						}
					}
					
					
					
		?>
		</section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
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
	
	
	



<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>