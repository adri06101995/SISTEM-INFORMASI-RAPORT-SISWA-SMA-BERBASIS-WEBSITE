<?php
require 'functions.php';

// ambil data di url
$id_mapel = $_GET["id_mapel"];

// query data akun berdasarkan prodi
$mapel = query("SELECT * FROM tb_mapel
	INNER JOIN tb_guru ON tb_mapel.nip = tb_guru.nip
	WHERE id_mapel = '$id_mapel'")[0];
 

// cek apakah tombol submit sudah di tekan atau belum
if( isset($_POST["submit"]) ) {
	
	
	//cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php?page=mapel';
			</script>
		";
	} else {
		echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'index.php?page=mapel';
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
				<h1>UBAH DATA MATA PELAJARAN</h1>
				<hr>
            </div>
            <div class="box-body">
		
                    <form action="" method="POST">	
                    
					<div class="form-group">
					
					<label for="id_mapel">Id Mapel</label>
					<input type="text" name="id_mapel" id="id_mapel" class="form-control"
					required autocomplete="off" value="<?=$mapel["id_mapel"]; ?>" readonly>
					<br>
					
					<label for="nama_mapel">Nama Mata Pelajaran</label>
					<input type="text" name="nama_mapel" id="nama_mapel" class="form-control"
					required autocomplete="off" value="<?=$mapel["nama_mapel"]; ?>">
					<br>
					
					<label for="nama_guru">Guru Pengajar</label>
					<select class="form-control" name="nama_guru" id="nama_guru">
					 <option value="<?=$mapel["nip"]; ?>"><?=$mapel["nama_guru"]; ?></option>
					<?php
					
					$ambil = mysqli_query($conn, "select * from tb_guru");
					while ($data = mysqli_fetch_assoc($ambil)){
					echo'<option value="'.$data['nip'].
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