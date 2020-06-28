<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_japel FROM tb_japel ORDER BY id_japel DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_japel'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "JD"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "JD"."0".$tambah;
}else{
	$format1 = "JD".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=japel';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=japel';
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
				<h1>TAMBAH DATA JADWAL PELAJARAN</h1>
				<hr>
            </div>	
            <div class="box-body">
		
                    <form action="" method="POST" enctype="multipart/form-data">	
                    
					<div class="form-group">
				
					<label for="id_japel">Id Jadwal Pelajaran</label>
					<input type="text" name="id_japel" id="id_japel" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
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
					
					<label for="file">Materi Pelajaran</label>
					<input type="file" name="file" id="file" class="form-control"
					required autocomplete="off">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  