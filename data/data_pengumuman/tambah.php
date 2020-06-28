<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_pengumuman FROM tb_pengumuman ORDER BY id_pengumuman DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_pengumuman'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "PN"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "PN"."0".$tambah;
}else{
	$format1 = "PN".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=pengumuman';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=pengumuman';
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
				<h1>TAMBAH DATA PENGUMUMAN</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
				
					
					<label for="id_pengumuman">Id Pengumuman</label>
					<input type="text" name="id_pengumuman" id="id_pengumuman" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="tgl_pengumuman">Tanggal Upload</label>
					<input type="text" name="tgl_pengumuman" id="tgl_pengumuman" class="form-control"
					required autocomplete="off" value="<?=date("d-M-Y");  ?>" readonly>
					<br>
					
					<label for="isi_pengumuman">Isi Pengumuman</label>
					<textarea name="isi_pengumuman" id="isi_pengumuman" rows="6" class="form-control"
					required autocomplete="off"></textarea>
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  