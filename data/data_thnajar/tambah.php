<?php
require 'functions.php';
	
	

$no = mysqli_query($conn, "SELECT id_thn_ajar FROM tb_thn_ajar ORDER BY id_thn_ajar DESC");

$id_kategori = mysqli_fetch_array($no);
$kode = $id_kategori['id_thn_ajar'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format1 = "TH"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format1 = "TH"."0".$tambah;
}else{
	$format1 = "TH".$tambah;
}



// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) )
	
	
//cek apakah data berhasil di tambahkan atau tidak
	if( tambah($_POST) > 0 ) {
		echo "<script>
				alert('data berhasil di tambahkan!');
				document.location.href = 'index.php?page=thnajar';
			</script>
			";
	} else {
		echo "<script>
				alert('data gagal di tambahkan!');
				document.location.href = 'index.php?page=thnajar';
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
				<h1>TAMBAH DATA TAHUN AJARAN</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
				
					
					<label for="id_thn_ajar">Id Tahun Ajaran</label>
					<input type="text" name="id_thn_ajar" id="id_thn_ajar" class="form-control"
					required autocomplete="off" value="<?php echo $format1;?>"readonly >
					<br>
					
					<label for="semester">Semester</label>
					<select class="form-control" id="semester" name="semester">
					  <option>-- Pilih--</option>
					  <option value="Genap">Genap</option>
					  <option value="Ganjil">Ganjil</option>
					</select>
					<br>
					
					<label for="nama_thn_ajar">Tahun Ajaran</label>
					<input type="text" name="nama_thn_ajar" id="nama_thn_ajar" class="form-control"
					required autocomplete="off" >
					<br>
					
					
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					
				</form>
				
				</div>
				</div>
			</div>
			<br>
			<br>

				






  