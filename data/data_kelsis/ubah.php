<?php
require 'functions.php';

// ambil data di url
$id_kelsis = $_GET["id_kelsis"];

// query data akun berdasarkan prodi
$kelsis = query("SELECT * FROM tb_kelsis
			INNER JOIN tb_kelas ON tb_kelsis.id_kelas = tb_kelas.id_kelas
			INNER JOIN tb_thn_ajar ON tb_kelsis.id_thn_ajar = tb_thn_ajar.id_thn_ajar
	        WHERE id_kelsis = '$id_kelsis'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=kelsis';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=kelsis';
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
				<h1>UBAH DATA KELAS SISWA</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_kelsis">Id</label>
					<input type="text" name="id_kelsis" id="id_kelsis" class="form-control"
					required autocomplete="off" value="<?= $kelsis["id_kelsis"];?>"readonly >
					<br>
					
					<input type="hidden" name="nis" id="nis" class="form-control"
					required autocomplete="off" value="<?= $kelsis["nis"];?>">
					
					<label for="nama_siswa">Nama Lengkap</label>
					<input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
					required autocomplete="off" value="<?= $kelsis["nama_siswa"];?>" readonly>
					<br>
					
					<label for="id_kelas">Kelas</label>
					<select class="form-control" name="id_kelas" id="id_kelas">
					 <option value="<?= $kelsis["id_kelas"];?>"><?= $kelsis["nama_kelas"];?></option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_kelas");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['id_kelas'].
					'">'.$data['nama_kelas'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<label for="id_thn_ajar">Tahun ajaran</label>
					<select class="form-control" name="id_thn_ajar" id="id_thn_ajar">
					 <option value="<?= $kelsis["id_thn_ajar"];?>"><?= $kelsis["nama_thn_ajar"];?></option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_thn_ajar");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['id_thn_ajar'].
					'">'.$data['nama_thn_ajar'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>