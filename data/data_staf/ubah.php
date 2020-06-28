<?php
require 'functions.php';

// ambil data di url
$nik = $_GET["nik"];

// query data akun berdasarkan prodi
$staf = query("SELECT * FROM tb_staf
	WHERE nik = '$nik'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=staf';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=staf';
			</script>
		";
	}
}
?>


 <div class="row">
		<div class="col-md-2">
		</div>
        <div class="col-md-12">

          <div class="box box-danger">
            <div class="box-header">
              <div class="text-center">
				<h1>UBAH DATA STAF</h1>
				<hr>
            </div>
            <div class="box-body">
		
                   <form action="" method="POST" enctype="multipart/form-data">
                    
					<div class="form-group">					
					
					<div class="col-md-6">
					<label for="nik">NIK</label>
					<input type="text" name="nik" id="nik" class="form-control"
					required autocomplete="off" value="<?=$staf["nik"]; ?>" readonly>
					<br>
					
					<label for="nama_staf">Nama Lengkap</label>
					<input type="text" name="nama_staf" id="nama_staf" class="form-control"
					required autocomplete="off" value="<?=$staf["nama_staf"]; ?>">
					<br>
					
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control"
					required autocomplete="off" value="<?=$staf["username"]; ?>">
					<br>
					
					<label for="password">Password</label>
					<input type="text" name="password" id="password" class="form-control"
					required autocomplete="off" value="<?=$staf["password"]; ?>">
					<br>
					
					<label for="level">Level</label>
					<select class="form-control" id="level" name="level">
					  <option><?=$staf["level"]; ?></option>
					  <option value="Admin">Admin</option>
					  <option value="staf biasa">Staf Biasa</option>
					</select>
					<br>
					
					<label for="tempat_lahir">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
					required autocomplete="off" value="<?=$staf["tempat_lahir"]; ?>">
					<br>
					
					<label for="tanggal_lahir">Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
					required autocomplete="off" value="<?=$staf["tanggal_lahir"]; ?>">
					<br>
					
					<?php $o = explode(',',$staf['jk']);   ?>
					<label for="jk">Jenis Kelamin</label>
					<div class="radio">
					  <label class="radio-inline">
						<input type="radio" name="jk" id="jk" value="Laki-laki" <?php in_array('Laki-laki', $o) ? print "checked" : ''?> >
						Laki-laki
					  </label>
					</div>
					<div class="radio">
					  <label class="radio-inline">
						<input type="radio" name="jk" id="jk" value="perempuan" <?php in_array('perempuan', $o) ? print "checked" : ''?> >
						Perempuan
					  </label>
					</div>
					<br>
					</div>
					
					<div class="col-md-6">
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control"
					required autocomplete="off" value="<?=$staf["alamat"]; ?>">
					<br>
					
					<label for="agama">Agama</label>
					<select class="form-control" id="agama" name="agama">
					  <option><?=$staf["agama"]; ?></option>
					  <option value="ISLAM">ISLAM</option>
					  <option value="KRISTEN">KRISTEN</option>
					  <option value="HINDU">HINDU</option>
					  <option value="BUDHA">BUDHA</option>
					  <option value="KATOLIK">KATOLIK</option>
					</select>
					<br>
					
					<label for="no_hp">No HP</label>
					<input type="text" name="no_hp" id="no_hp" class="form-control"
					required autocomplete="off" value="<?=$staf["no_hp"]; ?>">
					<br>
					
					<label for="foto">Foto </label><br>
					<img src="img/foto/staf/<?=$staf["foto"]; ?>" width="100"><br><br>
					<input type="file" name="foto" id="foto" class="form-control">
					</li>
					<br>
					
					<input type="hidden" name="fotolama" value="<?= $staf["foto"]; ?>" >
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					</div>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>