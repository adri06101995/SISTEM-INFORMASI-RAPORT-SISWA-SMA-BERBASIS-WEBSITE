<?php
session_start();

require '../database/koneksi.php';

if( isset($_SESSION["Login"]) ) {
	
}

if( isset($_POST["submit"]) ) {
	
	//ambil data dari form input
	$username = $_POST["username"];
	$password = $_POST["password"];
	$level = $_POST["level"];
	
	//cek apakah username dan password ada pada database
	$result1 = mysqli_query($conn, "SELECT * FROM tb_staf WHERE username = '".$username."' AND password = '".$password."'
	 AND level ='".$level."'");
	 
	$result2 = mysqli_query($conn, "SELECT * FROM tb_guru WHERE username = '".$username."' AND password = '".$password."'");
	 
	 $result3 = mysqli_query($conn, "SELECT * FROM tb_siswa WHERE username = '".$username."' AND password = '".$password."'
	 AND level ='".$level."'");
	 
	

	$data1 = mysqli_fetch_array($result1);
	$data2 = mysqli_fetch_array($result2);
	$data3 = mysqli_fetch_array($result3);
	
	
	
	
	$_SESSION['user'] = $data1['username'];
	$_SESSION['level'] = $data1['level'];
	
	$_SESSION['user'] = $data2['username'];
	
	$_SESSION['user'] = $data3['username'];
	$_SESSION['level'] = $data3['level'];
 
		// set session
		$_SESSION["Login"] = true;
		
		
		$level1 = $data1["level"];
		$level2 = $_POST["level"];
		$level3 = $data3["level"];
		
		
		
			if($level !== $level1){
				echo "<script>
				alert('Anda tidak terdaftar sebagai ".$level."...!');
			</script>";
		
		}elseif($level !== $level3){
				echo "<script>
				alert('Anda tidak terdaftar sebagai ".$level."...!');
			</script>";
		}
		
		
		
		if( mysqli_num_rows($result1) > 0 ) {
			if($data1['level'] == 'Admin'){
				session_start();
				$_SESSION['Admin'] = $data1[nik];
				header("location: ../index.php?page=pengumuman");
			}
		}
		
		if( mysqli_num_rows($result2) > 0 ) {
			if($level == 'guru'){
				session_start();
				$_SESSION['guru'] = $data2[nip];
				header("location: ../index.php?page=materi");
			}
		}
		
		if( mysqli_num_rows($result2) > 0 ) {
			if($level == 'walikelas'){
				session_start();
				$_SESSION['walikelas'] = $data2[nip];
				header("location: ../index.php?page=nilai&aksi=lihat");
			}
		}
		
		if( mysqli_num_rows($result3) > 0 ) {
			if($data3['level'] == 'siswa'){
				session_start();
				$_SESSION['siswa'] = $data3[nis];
				header("location: ../index.php?page=raport");
			}
		}
		
		
		

        else{
		echo "<script>
				alert('Username dan Password Salah..!');
				document.location.href = 'login.php';
			</script>";
		}
		
}




?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>

body {
    background-image: url("../img/logo/back.jpg");
    }
	
</style>


</head>

<body>
<div class="login-box">
  
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form role="form" method="post" action="">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" autocomplete="off">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
		
		<label for="level">Anda masuk sebagai..</label>
					<select class="form-control" id="level" name="level">
					  <option>-- Pilih--</option>
					  <option value="admin">Admin</option>
					  <option value="guru">Guru</option>
					  <option value="walikelas">Walikelas</option>
					  <option value="siswa">Siswa</option>
					</select>
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		<br>
          <button type="submit" name="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
