<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_kelsis FROM tb_kelsis ORDER BY id_kelsis DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_kelsis'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "KS"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "KS"."0".$tambah;
}else{
	$format1 = "KS".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=kelsis';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=kelsis';
			</script>";

}

// tombol cari ditekan
if( isset($_POST["cari"]) ){
	
$keyword = ($_POST["keyword"]); 
	
	$nama = query("SELECT * FROM tb_siswa
	WHERE nis = $keyword")[0];
	
	$nis = $nama["nis"];
	
	$adri = $nama["nama_siswa"];
	
}
//cek apakah data berhasil di tambahkan atau tidak
	
if( $keyword !== $nis ) {
		echo "<script>
				alert('NIS Tidak terdaftar...!');
			</script>";

}
	
	
	
	
?>



		
		 <div class="row">
		<div class="col-md-2">
		</div>
        <div class="col-md-8">

          <div class="box box-danger">
            <div class="box-header">
              <div class="text-center">
				<h1>TAMBAH DATA KELAS SISWA</h1>
				<hr>
            </div>
            <div class="box-body">
		
					<div class="form-group">
					
					<form action="" method="POST">
					
					<table>
					<th>
					<input type="text" name="keyword" id="keyword" class="form-control"
					required autocomplete="off" placeholder="Masukan NIS">
					</th>
					<th>
					<button type="submit" name="cari" class="btn btn-primary">cari</button>
					</th>
					</table>
					</form>
					<br>
					
					<form action="" method="POST">
					
					<label for="id_kelsis">Id</label>
					<input type="text" name="id_kelsis" id="id_kelsis" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<input type="hidden" name="nis" id="nis" class="form-control"
					required autocomplete="off" value="<?= $keyword ?>">
					
					<label for="nama_siswa">Nama Lengkap</label>
					<input type="text" name="nama_siswa" id="nama_siswa" class="form-control"
					required autocomplete="off" value="<?= $adri ?>" readonly>
					<br>
					
					<label for="id_kelas">Kelas</label>
					<select class="form-control" name="id_kelas" id="id_kelas">
					 <option>-- Pilih--</option>
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
					 <option>-- Pilih--</option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_thn_ajar");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['id_thn_ajar'].
					'">'.$data['nama_thn_ajar'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  