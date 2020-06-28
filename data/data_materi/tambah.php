<?php
require 'functions.php';

$no = mysqli_query($conn, "SELECT id_materi FROM tb_materi ORDER BY id_materi DESC");

$id_materi = mysqli_fetch_array($no);
$kode = $id_materi['id_materi'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format = "MT"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format = "MT"."0".$tambah;
}else{
	$format = "MT".$tambah;
}


if(isset($_POST['submit'])){
	
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambah!');
				document.location.href = 'index.php?page=materi';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah!');
				document.location.href = 'index.php?page=materi';
			</script>
		";
	}
}
	
?>


<div class="row">
     <div class="col-md-12">
        <!-- Form Elements -->
     <div class="panel panel-primary">
     <div class="panel-heading">
        Tambah Data Materi Pelajaran
     </div>
     <div class="panel-body">
		<div class="row">
          <div class="col-md-6 col-md-offset-3">
		  
          <form action="" method="POST" enctype="multipart/form-data">	
          <div class="form-group">
					<label for="id_materi">ID Materi</label>
					<input type="text" name="id_materi" id="id_materi" value="<?php echo $format;?>"class="form-control"
					required>
					<br>
					
					<label for="id_mapel">Mata Pelajaran</label>
					<select class="form-control" name="id_mapel" id="id_mapel">
					 <option>-- Pilih--</option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_mapel");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['id_mapel'].
					'">'.$data['nama_mapel'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<label for="file">File</label>
					<input type="file" name="file" id="file" class="form-control"
					required>
					<br>
					
					
					<input type="hidden" name="tgl_upload" id="tgl_upload" value="<?=date("d-M-Y");  ?>"class="form-control"
					readonly required>
					<br>
					
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				</form>
				</div>
			</div>

				






  