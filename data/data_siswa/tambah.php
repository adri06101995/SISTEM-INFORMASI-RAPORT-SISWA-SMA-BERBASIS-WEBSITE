<?php
require 'functions.php';



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=siswa';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=siswa';
			</script>";

}
	
?>



		
		 <div class="row">
		<div class="col-md-2">
		</div>
        <div class="col-md-12">

          <div class="box box-danger">
            <div class="box-header">
              <div class="text-center">
				<h1>TAMBAH DATA SISWA</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST" enctype="multipart/form-data">	
                    
					<div class="form-group">
				
					<div class="col-md-6">
					<label for="nis">NIS</label>
					<input type="text" name="nis" id="nis" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="nama_siswa">Nama Lengkap</label>
					<input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="username">Username</label>
					<input type="text" name="username" id="username" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="password">Password</label>
					<input type="text" name="password" id="password" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="no_hp_ortu">No HP Orang Tua</label>
					<input type="text" name="no_hp_ortu" id="no_hp_ortu" class="form-control"
					required autocomplete="off">
					<br>
			
					
					<label for="jk">Jenis Kelamin</label>
					<div class="radio">
					  <label class="radio-inline">
						<input type="radio" name="jk" id="jk" value="Laki-laki" checked>
						Laki-laki
					  </label>
					</div>
					<div class="radio">
					  <label class="radio-inline">
						<input type="radio" name="jk" id="jk" value="Perempuan" checked>
						Perempuan
					  </label>
					</div>
					<br>
					</div>
					
					<div class="col-md-6">
					<label for="tempat_lahir">Tempat Lahir</label>
					<input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="tanggal_lahir">Tanggal Lahir</label>
					<input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="alamat">Alamat</label>
					<input type="text" name="alamat" id="alamat" class="form-control"
					required autocomplete="off">
					<br>
					
					<label for="agama">Agama</label>
					<select class="form-control" id="agama" name="agama">
					  <option>-- Pilih--</option>
					  <option value="ISLAM">ISLAM</option>
					  <option value="KRISTEN">KRISTEN</option>
					  <option value="HINDU">HINDU</option>
					  <option value="BUDHA">BUDHA</option>
					  <option value="KATOLIK">KATOLIK</option>
					</select>
					<br>
					
					<label for="foto">Foto</label>
					<input type="file" name="foto" id="foto" class="form-control"
					required autocomplete="off">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					</div>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  