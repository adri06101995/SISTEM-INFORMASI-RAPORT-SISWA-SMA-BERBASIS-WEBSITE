<?php
require 'functions.php';

// ambil data di url
$id_thn_ajar = $_GET["id_thn_ajar"];

// query data akun berdasarkan prodi
$thnajar = query("SELECT * FROM tb_thn_ajar
	WHERE id_thn_ajar = '$id_thn_ajar'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=thnajar';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=thnajar';
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
				<h1>UBAH DATA TAHUN AJARAN</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_thn_ajar">Id Tahun Ajaran</label>
					<input type="text" name="id_thn_ajar" id="id_thn_ajar" class="form-control"
					required autocomplete="off" value="<?=$thnajar["id_thn_ajar"]; ?>" readonly >
					<br>
					
					<label for="semester">Semester</label>
					<select class="form-control" id="semester" name="semester">
					  <option value="<?=$thnajar["semester"]; ?>"><?=$thnajar["semester"]; ?></option>
					  <option value="Genap">Genap</option>
					  <option value="Ganjil">Ganjil</option>
					</select>
					<br>
					
					<label for="nama_thn_ajar">Tahun Ajaran</label>
					<input type="text" name="nama_thn_ajar" id="nama_thn_ajar" class="form-control"
					required autocomplete="off" value="<?=$thnajar["nama_thn_ajar"]; ?>">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>