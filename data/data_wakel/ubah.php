<?php
require 'functions.php';

// ambil data di url
$id_walikelas = $_GET["id_walikelas"];

// query data akun berdasarkan prodi
$wakel = query("SELECT * FROM tb_wakel
	WHERE id_walikelas = '$id_walikelas'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=wakel';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=wakel';
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
				<h1>UBAH DATA WALI KELAS</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_walikelas">Id Walikelas</label>
					<input type="text" name="id_walikelas" id="id_walikelas" class="form-control"
					required autocomplete="off" value="<?=$wakel["id_walikelas"]; ?>" readonly>
					<br>
					
					<label for="nama_guruwali">Wali Kelas</label>
					<select class="form-control" name="nama_guruwali" id="nama_guruwali">
					 <option><?=$wakel["nama_guruwali"]; ?></option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_guru");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['nama_guru'].
					'">'.$data['nama_guru'].'</option>';
					} 
					?>
					</select>
					<br>
					
					<button type="submit" name="submit" class="btn btn-primary">Ubah</button>
					
				</form>
				</div>
			</div>
			</div>
			</div>
			<br>
			<br>