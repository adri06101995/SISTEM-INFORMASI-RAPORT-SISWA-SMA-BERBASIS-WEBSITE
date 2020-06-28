<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_mapel FROM tb_mapel ORDER BY id_mapel DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_mapel'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "MP"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "MP"."0".$tambah;
}else{
	$format1 = "MP".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=mapel';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=mapel';
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
				<h1>TAMBAH DATA MATA PELAJARAN</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
				
					
					<label for="id_mapel">Id Mapel</label>
					<input type="text" name="id_mapel" id="id_mapel" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="nama_mapel">Nama Mata Pelajaran</label>
					<input type="text" name="nama_mapel" id="nama_mapel" class="form-control"
					required autocomplete="off" >
					<br>
					
					<label for="nama_guru">Guru Pengajar</label>
					<select class="form-control" name="nama_guru" id="nama_guru">
					 <option>-- Pilih--</option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_guru");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['nip'].
					'">'.$data['nama_guru'].'</option>';
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

				






  