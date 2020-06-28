<?php
require 'functions.php';

// ambil data di url
$id_pengumuman = $_GET["id_pengumuman"];

// query data akun berdasarkan prodi
$pengumuman = query("SELECT * FROM tb_pengumuman
	WHERE id_pengumuman = '$id_pengumuman'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=pengumuman';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=pengumuman';
			</script>
		";
	}
}
?>


 <div class="row">
		<div class="col-md-2">
		</div>
        <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <div class="text-center">
				<h1>UBAH DATA PENGUMUMAN</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_pengumuman">Id Pengumuman</label>
					<input type="text" name="id_pengumuman" id="id_pengumuman" class="form-control"
					required autocomplete="off" value="<?=$pengumuman["id_pengumuman"]; ?>" readonly>
					<br>
					
					<label for="tgl_pengumuman">Tanggal Upload</label>
					<input type="text" name="tgl_pengumuman" id="tgl_pengumuman" class="form-control"
					required autocomplete="off" value="<?=$pengumuman["tgl_pengumuman"]; ?>" readonly>
					<br>
					
					<label for="isi_pengumuman">Isi Pengumuman</label>
					<textarea name="isi_pengumuman" id="isi_pengumuman" rows="6" class="form-control"
					required autocomplete="off" ><?=$pengumuman["isi_pengumuman"]; ?></textarea>
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>