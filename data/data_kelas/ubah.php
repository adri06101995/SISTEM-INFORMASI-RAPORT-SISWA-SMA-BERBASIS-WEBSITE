<?php
require 'functions.php';

// ambil data di url
$id_kelas = $_GET["id_kelas"];

// query data akun berdasarkan prodi
$kelas = query("SELECT * FROM tb_kelas
			INNER JOIN tb_wakel ON tb_kelas.id_walikelas = tb_wakel.id_walikelas
	        WHERE id_kelas = '$id_kelas'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=kelas';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=kelas';
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
				<h1>UBAH DATA KELAS</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_kelas">Id Kelas</label>
					<input type="text" name="id_kelas" id="id_kelas" class="form-control"
					required autocomplete="off" value="<?=$kelas["id_kelas"]; ?>" readonly >
					<br>
					
					<label for="nama_guruwali">Wali Kelas</label>
					<select class="form-control" name="nama_guruwali" id="nama_guruwali">
					 <option value="<?=$kelas["id_walikelas"]; ?>"><?=$kelas["nama_guruwali"]; ?></option>
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
					required autocomplete="off" value="<?=$kelas["nama_kelas"]; ?>">
					<br>
					
					<label for="kapasitas">Kapasitas</label>
					<input type="text" name="kapasitas" id="kapasitas" class="form-control"
					required autocomplete="off" value="<?=$kelas["kapasitas"]; ?>">
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>