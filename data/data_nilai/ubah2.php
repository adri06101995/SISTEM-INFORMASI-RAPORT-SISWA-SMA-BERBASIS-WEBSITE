<?php
require 'functions.php'; 

$id_nilai = $_GET["id_nilai"];

$nilai = query("SELECT * FROM tb_nilai
			INNER JOIN tb_kelas ON tb_nilai.id_kelas = tb_kelas.id_kelas
			INNER JOIN tb_kelsis ON tb_nilai.nis = tb_kelsis.nis
			WHERE id_nilai = '$id_nilai'")[0];


if(isset($_POST['submit'])){
	
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=nilai&aksi=lihat';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=nilai&aksi=lihat';
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
				<h1>UBAH NILAI SISWA</h1>
				<hr>
            </div>
            <div class="box-body">
			
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					
					
					<input type="hidden" name="id_nilai" id="id_nilai" class="form-control"
					required autocomplete="off" value="<?=$nilai["id_nilai"]; ?>">
					<br>
				
					
					<?php
		
					$sql_kategori = mysqli_query($conn,'select * from tb_kelas');
					
					?>
					<div class="col-md-6">
					<label>Nama kelas</label>
					<select class="form-control" name="kelas1" id="kelas1">
					<option value="<?=$nilai["id_kelas"]; ?>"><?=$nilai["nama_kelas"]; ?></option>
					<?php while($row_kategori = mysqli_fetch_array($sql_kategori)) { ?>
					<option value="<?php echo $row_kategori['id_kelas'] ?>"><?php echo $row_kategori['nama_kelas'] ?></option>
				    <?php } ?>
					</select>
					<br>
	
			
					<label> Tahun Ajaran</label>
					<select class="form-control" id="thn_ajar" name="thn_ajar">
					<option value="<?=$nilai["tahun_ajaran"]; ?>"><?=$nilai["tahun_ajaran"]; ?></option>
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
					<option value="<?=$nilai["mapel"]; ?>"><?=$nilai["mapel"]; ?></option>
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
					<option value="<?=$nilai["nama_siswa"]; ?>"><?=$nilai["nama_siswa"]; ?></option>
					<option>Nama Siswa</option>
					
					</select>
					<br>
					</div>
					
					
					
					<div class="col-md-6">
					<label for="tg1">Nilai Tugas 1</label>
					<input type="text" name="tgs1" id="tgs1" class="form-control"
					required autocomplete="off" value="<?=$nilai["tgs1"]; ?>" >
					<br>
					
					<label for="tg2">Nilai Tugas 2</label>
					<input type="text" name="tgs2" id="tgs2" class="form-control"
					required autocomplete="off" value="<?=$nilai["tgs2"]; ?>">
					<br>
					
					<label for="tg3">Nilai Tugas 3</label>
					<input type="text" name="tgs3" id="tgs3" class="form-control"
					required autocomplete="off" value="<?=$nilai["tgs3"]; ?>">
					<br>
					
					<label for="uts">Nilai UTS</label>
					<input type="text" name="uts" id="uts" class="form-control"
					required autocomplete="off" value="<?=$nilai["uts"]; ?>">
					<br>
					
					<label for="uas">Nilai UAS</label>
					<input type="text" name="uas" id="uas" class="form-control"
					required autocomplete="off" value="<?=$nilai["uas"]; ?>">
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
