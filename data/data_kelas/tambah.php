<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_kelas FROM tb_kelas ORDER BY id_kelas DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_kelas'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "KL"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "KL"."0".$tambah;
}else{
	$format1 = "KL".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=kelas';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=kelas';
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
				<h1>TAMBAH DATA KELAS</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
				
					
					<label for="id_kelas">Id Kelas</label>
					<input type="text" name="id_kelas" id="id_kelas" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="nama_guruwali">Wali Kelas</label>
					<select class="form-control" name="nama_guruwali" id="nama_guruwali">
					 <option>-- Pilih--</option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_wakel");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['id_walikelas'].
					'">'.$data['nama_guruwali'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<label for="nama_kelas">Nama Kelas</label>
					<input type="text" name="nama_kelas" id="nama_kelas" class="form-control"
					required autocomplete="off" >
					<br>
					
					<label for="kapasitas">Kapasitas</label>
					<input type="text" name="kapasitas" id="kapasitas" class="form-control"
					required autocomplete="off" >
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  