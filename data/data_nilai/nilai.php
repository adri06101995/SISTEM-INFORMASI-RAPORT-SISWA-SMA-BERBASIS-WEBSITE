<?php
require 'functions.php';

$no = mysqli_query($conn, "SELECT id_nilai FROM tb_nilai ORDER BY id_nilai DESC");

$id_nilai = mysqli_fetch_array($no);
$kode = $id_nilai['id_nilai'];

$urut = substr($kode, 2, 3);
$tambah = (int) $urut + 1;

if(strlen($tambah) == 1) {
		$format = "Nl"."00".$tambah;
}else if(strlen($tambah) == 2) {
	$format = "Nl"."0".$tambah;
}else{
	$format = "Nl".$tambah;
}


if( isset($_POST["pilih"]) ){
	
	$kelas = $_POST["kelas"];
	$nama_thn_ajar = $_POST["thn_ajar"];
	$mapel = ($_POST["mapel"]);
	
	
	$kelsis = mysqli_query($conn,"select * from tb_kelsis
	INNER JOIN tb_kelas ON tb_kelsis.id_kelas = tb_kelas.id_kelas
	INNER JOIN tb_thn_ajar ON tb_kelsis.id_thn_ajar = tb_thn_ajar.id_thn_ajar
	WHERE nama_kelas='$kelas' AND nama_thn_ajar='$nama_thn_ajar'");
	

	while ($tampil = mysqli_fetch_assoc($kelsis)) {
	$jumlah = mysqli_num_rows($kelsis);
}


} 


if(isset($_POST['submit'])){
	
	if( tambah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil ditambah!');
				document.location.href = 'index.php?page=nilai';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal ditambah!');
				document.location.href = 'index.php?page=nilai';
			</script>
		";
	}
}
							
			
?>

<div class="content">
	 <div class="row">
		<div class="col-md-2">
		</div>
        <div class="col-md-12">

          <div class="box box-danger">
            <div class="box-header">
              <div class="text-center">
				<h1>INPUT NILAI SISWA</h1>
				<hr>
            </div>
            <div class="box-body">
			
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					
					
					<input type="hidden" name="id_nilai" id="id_nilai" class="form-control"
					required autocomplete="off" value="<?= $format; ?>">
					<br>
				
					
					<?php
		
					$sql_kategori = mysqli_query($conn,'select * from tb_kelas');
					
					?>
					<div class="col-md-6">
					<label>Nama kelas</label>
					<select class="form-control" name="kelas1" id="kelas1">
					<option>-- Pilih Kategori --</option>
					<?php while($row_kategori = mysqli_fetch_array($sql_kategori)) { ?>
					<option value="<?php echo $row_kategori['id_kelas'] ?>"><?php echo $row_kategori['nama_kelas'] ?></option>
				    <?php } ?>
					</select>
					<br>
	
			
					<label> Tahun Ajaran</label>
					<select class="form-control" id="thn_ajar" name="thn_ajar">
					 <option>-- Pilih Tahun Ajaran--</option>
					 <?php
					
					$ambil = mysqli_query($conn, "select * from tb_thn_ajar");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['nama_thn_ajar'].
					'">'.$data['semester'].'   ||   '.$data['nama_thn_ajar'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<label>Mata Pelajaran</label>
					<select class="form-control" id="mapel" name="mapel">
					 <option>-- Pilih Mata Pelajaran--</option>
					 <?php
					
					$ambil = mysqli_query($conn, "select * from tb_mapel");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['nama_mapel'].
					'">'.$data['nama_mapel'].'</option>';
					} 
					?>
					</select>
					<br>
			
					
					
					<label>Nama Siswa</label>
					<select class="form-control" id="siswa1" name="siswa1">
					<option>Nama Siswa</option>
					
					</select>
					<br>
					</div>
					
					
					
					<div class="col-md-6">
					<label for="tg1">Nilai Tugas 1</label>
					<input type="text" name="tgs1" id="tgs1" class="form-control"
					required autocomplete="off" >
					<br>
					
					<label for="tg2">Nilai Tugas 2</label>
					<input type="text" name="tgs2" id="tgs2" class="form-control"
					required autocomplete="off" >
					<br>
					
					<label for="tg3">Nilai Tugas 3</label>
					<input type="text" name="tgs3" id="tgs3" class="form-control"
					required autocomplete="off" >
					<br>
					
					<label for="uts">Nilai UTS</label>
					<input type="text" name="uts" id="uts" class="form-control"
					required autocomplete="off" >
					<br>
					
					<label for="uas">Nilai UAS</label>
					<input type="text" name="uas" id="uas" class="form-control"
					required autocomplete="off" >
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
					</div>
			</form>
		
			
            </div>
             
            </div>
            <!-- /.box-header -->
            

 
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.content -->
  </div>

<br>
<br>
